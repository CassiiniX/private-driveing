<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	CourseModel
};

class CourseRunningController extends BaseController{
	private $courseModel;

	public function __construct(){
		$this->courseModel = new CourseModel();
	}

	public function running($id){
		if(intval($id) < 1){
			return redirect()->back();
		}
		
		$dataCourse = $this->courseModel
			->where("id",$id)
			->where("status","waiting")
			->first();

		if(!$dataCourse){
			return redirect()->back();
		}
		
		if($this->courseModel->update($id,[
			"status" => "running"
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