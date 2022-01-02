<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	CourseModel,	
	ManualPaymentModel
};

class ManualPaymentFailedController extends BaseController{
	private $courseModel;
	private $manualPaymentModel;

	public function __construct(){
		$this->courseModel = new CourseModel();
		$this->manualPaymentModel = new ManualPaymentModel();
	}

	public function failed($id){
		if(intval($id) < 1){
			return redirect()->back();
		}

		$manualPayment = $this->manualPaymentModel
			->where('id',$id)
			->where('status','validasi')
			->first();

		if(!$manualPayment){
			return redirect()->back();
		}

		$course = $this->courseModel
			->where('id',$manualPayment['course_id'])
			->where('status','payment')
			->first();

		if(!$course){
			return redirect()->back();
		}

		if($this->manualPaymentModel->update($id,[
			"status" => "failed"
		])){
			return redirect()->back()->with("fallback",[
				"message" => "success",
				"success" => "Berhasil mengubah status"
			]);
		}

		return redirect()->back()->with("fallback",[
			"message" => "failed",
			"failed" => "Terjadi Kesalahan"
		]);
	}
}