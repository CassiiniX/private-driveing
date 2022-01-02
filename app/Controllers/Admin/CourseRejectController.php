<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	CourseModel,
	InstructurModel
};

class CourseRejectController extends BaseController{
	private $courseModel;
	private $instructurModel;

	public function __construct(){
		$this->courseModel = new CourseModel();
		$this->instructurModel = new InstructurModel();
	}

	public function reject($id){
		if(intval($id) < 1){
			return redirect()->back();
		}
	
		$dataCourse = $this->courseModel
			->where("id",$id)
			->where("status","pending")
			->first();

		if(!$dataCourse){
			return redirect()->back();
		}
	
		$this->db->transStart();		

		if($this->courseModel->update($id,[
			"status" => "rejected"
		])){
			$this->instructurModel->update($dataCourse['instructur_id'],[
				"status" => "active"
			]);

			$this->db->transComplete();

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