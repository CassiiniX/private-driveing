<?php namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\{
	CourseModel,
	InstructurModel,
	PackageModel
};
use Carbon\Carbon;

// AKTIFKAN LOG INFO DI CONFIG/LOGGER DULU BRO
// log_message('info','Hai');

class OrderController extends BaseController
{
	private $packageModel;
	private $instructurModel;
	private $courseModel;
	
	public function __construct(){
		$this->packageModel = new PackageModel();
		$this->instructurModel = new InstructurModel();
		$this->courseModel = new CourseModel();		
	}

	public function order(){		
		$rules = [
			"package" => "required|is_natural",
			"instructur" => "required|is_natural",
			"hour" => "required|is_natural",
			"date_start" => "required",
			"clock_start" => "required|is_natural",	
		];

		$messages = [
			"package" => [
				"required" => "Paket harus diisi",
				"is_natural" => "Data paket tidak valid"
			],
			"instructur" => [
				"required" => "Instruktur harus diisi",
				"is_natural" => "Data instruktur tidak valid"
			],
			"hour" => [
				"required" => "Jam harus diisi",
				"is_natural" => "Data jam tidak valid"
			],
			"date_start" => [
				"required" => "Tanggal mulai harus diisi"
			],
			"clock_start" => [
				"required" => "Jam mulai harus diisi",
				"is_natural" => "Data jam mulai tidak valid"
			]
		];
		
		$this->validation->setRules($rules,$messages);

		$this->validation->withRequest($this->request)->run();

		if(count($this->validation->getErrors())){
			return redirect()->to("/user/package")->with("fallback",[
				"message" => "failed",
				"failed" => $this->validation->getErrors()[array_keys($this->validation->getErrors())[0]]
			]);
		}

		if(!date('Y-m-d',strtotime(input_sanitize($this->request->getPost('date_start')))) === input_sanitize($this->request->getPost('date_start'))){
			return redirect()->to("/user/package")->with("fallback",[
				"message" => "failed",
				"failed" => "Tanggal mulai tidak valid"
			]);
		}

		if(!Carbon::now()
			->addDays(intval($_ENV['app.payment_day']))
			->isBefore(Carbon::create(input_sanitize($this->request->getPost('date_start'))))){
			return redirect()->to("/user/package")->with("fallback",[
				"message" => "failed",
				"failed" => "Tanggal mulai tiak valid"
			]);
		}

		$package = $this->packageModel
			->where('status','active')
			->where('id',input_sanitize($this->request->getPost('package')))
			->first();

		if(!$package){
			return redirect()->to("/user/package")->with("fallback",[
				"message" => "failed",
				"failed"=> "Terjadi Kesalahan"
			]);
		}		
		
		$instructur = $this->instructurModel
			->where('status','active')
			->where('id',input_sanitize($this->request->getPost('instructur')))
			->first();

		if(!$instructur){
			return redirect()->to("/user/package")->with("fallback",[
				"message" => "failed",
				"failed" => "Terjadi Kesalahan"
			]);
		}

		if($instructur['status'] == "hire"){
			return redirect()->to("/user/package")->with("fallback",[
				"message" => "failed",
				"failed" => "Maaf sepertinya instruktur yang anda pilih telah sudah tersewa"
			]);
		}

		if($this->courseModel
			->whereIn('status',['pending','payment','waiting','running'])
			->where('user_id',session('user')['id'])
			->first()){
			return redirect()->to("/user/package")->with("fallback",[
				"message" => "failed",
				"failed" => "Maaf anda masih memiliki kursus yang belum selesai"
			]);
		}	

		$payload = [];
		$payload['user_id'] = session('user')['id'];
		$payload['instructur_id'] = input_sanitize($this->request->getPost('instructur'));
		$payload['meet'] = $package['meet'];
		$payload['cost'] = $package['cost'];
		$payload['hour'] = input_sanitize($this->request->getPost('hour'));
		$payload['date_start'] =  input_sanitize($this->request->getPost('date_start'));
		$payload['clock_start'] = input_sanitize($this->request->getPost('clock_start')).":00:00";
	
		$this->db->transStart();

		if($this->courseModel->insert($payload)){
			$this->instructurModel->update($payload['instructur_id'],[
				"status" => "hire"
			]);

			$this->db->transComplete();

			return redirect()->to("/user/course")->with("fallback",[
				"message" => "success",
				"success" => "Berhasil memesan kursus"
			]);
		}

		return redirect()->to("/user/package")->with("fallback",[
			"message" => "failed",
			"failed" => "Terjadi Kesalahan"
		]);	
	}
}