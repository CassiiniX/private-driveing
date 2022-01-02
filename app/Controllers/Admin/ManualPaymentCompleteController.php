<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	CourseModel,
	UserModel,
	InstructurModel,
	ManualPaymentModel
};
use Carbon\Carbon;

class ManualPaymentCompleteController extends BaseController{
	private $courseModel;
	private $manualPaymentModel;

	public function __construct(){
		$this->courseModel = new CourseModel();
		$this->manualPaymentModel = new ManualPaymentModel();
	}

	public function complete($id){
		if(intval($id) < 1){
			return redirect()->back();
		}

		$isValidate = $this->manualPaymentModel
			->where('course_id',$id)
			->where('status','validasi')
			->first();

		if($isValidate){
			return redirect()->back();
		}

		if($this->courseModel->update($id,[
			"status" => "waiting"
		])){
			return redirect()->back()->with("fallback",[
				"message" => "success",
				"success" => "Berhasil mengubah data"
			]);
		}
		
		return redirect()->back()->with("fallback",[
			"message" => "failed",
			"failed" => "Terjadi Kesalahan"
		]);
	}
}