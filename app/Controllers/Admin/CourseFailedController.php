<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	CourseModel,
	InstructurModel,
	ManualPaymentModel
};
use Carbon\Carbon;

class CourseFailedController extends BaseController{
	private $courseModel;
	private $instructurModel;
	private $manualPaymentModel;

	public function __construct(){
		$this->courseModel = new CourseModel();
		$this->instructurModel = new InstructurModel();
		$this->manualPaymentModel = new ManualPaymentModel();
	}

	public function failed($id){
		if(intval($id) < 1){
			return redirect()->back();
		}

		$dataCourse = $this->courseModel
			->where("id",$id)
			->where("status","payment")
			->first();

		if(!$dataCourse){
			return redirect()->back();
		}

		$isLate = Carbon::now()
			->isAfter(Carbon::parse($dataCourse['created_at'])
			->addDays($_ENV['app.payment_day']));

		if(!$isLate){
			return redirect()->back();
		}
	
		$this->db->transStart();		

		if($this->courseModel->update($id,[
			"status" => "failed"
		])){
			$this->instructurModel->update($dataCourse['instructur_id'],[
				"status" => "active"
			]);

			$this->manualPaymentModel->where('course_id', $dataCourse['id'])
			 	->where('status','validasi')
    			->set([
    				'status' => 'failed'
    			])
    			->update();		

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