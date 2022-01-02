<?php namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\{
	CourseModel,
	InstructurModel,
	ManualPaymentModel,
	InstructurFeedbackModel
};

class ReviewController extends BaseController
{
	private $courseModel;
	private $instructurModel;
	private $instructurFeedbackModel;

	public function __construct(){
		$this->courseModel = new CourseModel();	
		$this->instructurFeedbackModel = new InstructurFeedbackModel();
		$this->instructurModel = new InstructurModel();
	}

	public function review(){
		$this->validation->setRules([
			"comment" => "required",
			"star" => "required|is_natural"
		],[
			"comment" => [
				"required" => "Komentar harus diisi"
			],
			"star" => [
				"required" => "Bintang harus diisi",
				"is_natural" => "Bintang tidak valid"
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
			->whereIn('status',['running'])
			->first();

		if(!$course){
			return redirect()->to("/user/course")->with("fallback",[
				"message" => "failed",
				"failed" => "Terjadi Kesalahan"
			]);
		}

		$payload = [
			"user_id" => session('user')['id'],
			"instructur_id" => $course['instructur_id'],
			"comment" => input_sanitize($this->request->getPost('comment')),
			"star" => input_sanitize($this->request->getPost('star'))
		];

		$this->db->transStart();

		if($this->instructurFeedbackModel->insert($payload)){
			$instructurData = $this->instructurFeedbackModel
				->selectSum('star')
				->selectCount('id')
				->where('instructur_id',$course['instructur_id'])			
				->first();			

			$this->instructurModel->update($course['instructur_id'],[
				"star" => round($instructurData['star']/$instructurData['id'])
			]);

			$this->db->transComplete();

			return redirect()->to("/user/course")->with("fallback",[
				"message" => "success",
				"success" => "Berhasil membuat review"
			]);			
		}

		return redirect()->to("/user/course")->with("fallback",[
			"message" => "failed",
			"failed" => "Terjadi Kesalahan"
		]);
	}
}