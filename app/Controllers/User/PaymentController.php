<?php namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\{
	CourseModel,
	ManualPaymentModel
};

class PaymentController extends BaseController
{
	private $courseModel;
	private $manualPaymentModel;

	public function __construct(){
		$this->courseModel = new CourseModel();
		$this->manualPaymentModel = new ManualPaymentModel();
	}

	public function index(){
		return view("user/payment");
	}

	public function payment(){			
		$this->validation->setRules([
			"description" => "required",
			"proof" => "uploaded[proof]|max_size[proof,10024]|mime_in[proof,image/jpg,image/jpeg,image/png]|max_dims[proof,5000,5000]"
		],[
			"description" => [
				"required" => "Keterangan harus diisi"
			],
			"proof" => [
				"uploaded" => "Bukti harus diisi",
				"max_size" => "Max gambar bukti 10 mb",
				"mime_in" => "Bukti tidak valid",
				"max_dims" => "Dimensi bukti tidak valid"
			]
		]);

		$this->validation->withRequest($this->request)->run();

		if(count($this->validation->getErrors())){
			return redirect()->to("/user/course")->with("fallback",[
				"message" => "failed",
				"failed" => $this->validation->getErrors()[array_keys($this->validation->getErrors())[0]]
			]);
		}

		$course = $this->courseModel
			->where('user_id',session('user')['id'])
			->whereIn('status',['payment'])
			->first();

		if(!$course){
			return redirect()->to("/user/course")->with("fallback",[
				"message" => "failed",
				"failed" => "Terjadi Kesalahan"
			]);
		}
				
		$proof = $this->request->getFile('proof');

	    $name = $proof->getRandomName();	  

		$image = \Config\Services::image();		

  		if($image->withFile($proof->getTempName())  		   
        	->save('./assets/images/proofs/'.$name)){
  			$payload = [
  				"user_id" => session('user')['id'],
  				"course_id" => $course['id'],
  				"proof" => $name,
  				"description" => input_sanitize($this->request->getPost('description'))
  			];
  			

  			if($this->manualPaymentModel->insert($payload)){
  				return redirect()->to("/user/course")->with("fallback",[
  					"message" => "success",
  					"success" => "Berhasil mengirim bukti,admin akan memvalidasi dalam kurun waktu 1x24 jam"
  				]);
  			}
  		}

  		return redirect()->to("/user/course")->with("fallback",[
  			"message" => "failed",
  			"error" => "Terjadi Kesalahan"
  		]);
	}
}