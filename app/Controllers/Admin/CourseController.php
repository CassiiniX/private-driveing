<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	CourseModel,
	UserModel,
	InstructurModel,
	ManualPaymentModel
};
use Carbon\Carbon;

class CourseController extends BaseController{
	private $userModel;
	private $instructurModel;
	private $courseModel;
	private $manualPaymentModel;

	public function __construct(){
		$this->userModel = new UserModel();
		$this->instructurModel = new InstructurModel();
		$this->courseModel = new CourseModel();	
		$this->manualPaymentModel = new ManualPaymentModel();
	}

	public function index(){
		$dataCourse = $this->courseModel;

		if(!empty($this->request->getGet('search'))){
			$search = input_sanitize($this->request->getGet('search'));

			$dataCourse = $dataCourse
				->orWhere("id",$search)
				->orWhere("meet",$search)
				->orWhere("cost",$search)
				->orWhere("status",$search)
				->orWhere("hour",$search);
		}

		$dataCourse = $dataCourse
        		->orderBy('id','desc')
        		->paginate(10,'query');	

        foreach ($dataCourse as $key => $item) {               
        	$dataCourse[$key]["user"] = $this->userModel
        		->where('id',$item['user_id'])
        		->first();
        	$dataCourse[$key]["instructur"] = $this->instructurModel
        		->where('id',$item['instructur_id'])
        		->first();
        }        		

		$data = [
        	"course" => $dataCourse,
            "pager" => $this->courseModel->pager,
            "search" => $this->request->getGet('search')
        ];

		return view("admin/course",$data);
	}

	public function detail($id){
		if(intval($id) < 1){
			return redirect()->back();
		}

		$course = $this->courseModel
			->where('id',$id)
			->first();

		if(!$course){
			return redirect()->back();
		}
	
		$user = $this->userModel
			->where('id',$course['user_id'])
			->first();

		$instructur = $this->instructurModel
			->where('id',$course['instructur_id'])
			->first();

		$manualPayment = $this->manualPaymentModel
			->where('course_id',$course['id'])
			->findAll();	

		$paymentLate = Carbon::parse($course['created_at'])
			->addDays($_ENV['app.payment_day'])
			->toDateTimeString();
		
		$isLate = Carbon::now()->isAfter(Carbon::parse($course['created_at'])
			->addDays($_ENV['app.payment_day']));

		return view("admin/course-detail",[
			"course" => $course,
			"user" => $user,
			"instructur" => $instructur,
			"manualPayment" => $manualPayment,
			"paymentLate" => $paymentLate,
			"isLate" => $isLate
		]);
	}
}