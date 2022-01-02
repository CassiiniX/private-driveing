<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	CourseModel,
	ManualPaymentModel,
	UserModel,
	ContactModel	
};
use Carbon\Carbon;

class HomeController extends BaseController{
	private $courseModel;
	private $manualPaymentModel;
	private $userModel;
	private $contactModel;

	public function __construct(){
		$this->courseModel = new CourseModel();
		$this->manualPaymentModel = new ManualPaymentModel();
		$this->userModel = new UserModel();
		$this->contactModel = new ContactModel();		
	}

	public function index(){
		$chart = [];

		for($i=0;$i<5;$i++){
			$dataLabel = Carbon::now()
				->subMonth($i+1)
				->format("M Y");

			$startDateMonth = Carbon::now()
				->subMonth($i+1)
				->startOfMonth()
				->toDateTimeString();

			$endDateMonth = Carbon::now()
				->subMonth($i+1)
				->endOfMonth()
				->toDateTimeString();

			$dataY = $this->courseModel
				->selectCount('id')
				->where("created_at > ",$startDateMonth)
				->where("created_at < ",$endDateMonth)
				->first()['id'];	

			$chart[] = [
				"y" => $dataY,
				"label" => $dataLabel
			];
		}

		$data = [
			"course_active" => $this->courseModel
				->selectCount('id')
				->whereIn("status",["pending","waiting","payment","running"])
				->first()['id'],
			"manual_payment_active" => $this->manualPaymentModel
				->selectCount('id')
				->where('status','validasi')
				->first()['id'],
			"user_new" => $this->userModel
				->selectCount("id")
				->where('created_at >',Carbon::now()->subDays(3)->toDateTimeString())
				->first()['id'],
			"contact_new" => $this->contactModel 
				->selectCount("id")
				->where("created_at >",Carbon::now()->subDays(3)->toDateTimeString())
				->first()['id'],
			"last_user" => $this->userModel
				->where('created_at >',Carbon::now()->subDays(3)->toDateTimeString())
				->orderBy('id','desc')
				->get(5,0),
			"chart" => $chart
		];

		return view("admin/home",$data);
	}
}