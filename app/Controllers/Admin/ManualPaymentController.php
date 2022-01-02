<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	CourseModel,
	UserModel,
	InstructurModel,
	ManualPaymentModel
};
use Carbon\Carbon;

class ManualPaymentController extends BaseController{
	private $userModel;
	private $courseModel;
	private $manualPaymentModel;
	private $instructurModel;

	public function __construct(){
		$this->userModel = new UserModel();
		$this->courseModel = new CourseModel();
		$this->manualPaymentModel = new ManualPaymentModel();		
		$this->instructurModel = new InstructurModel();
	}

	public function index(){	
		$dataManualPayment = $this->manualPaymentModel;

		if(!empty($this->request->getGet('search'))){
			$search = $this->request->getGet('search');

			$dataManualPayment = $dataManualPayment
				->orWhere('id',$search)
				->orWhere('status',$search)
				->orWhere('course_id',$search)
				->orWhere('description',$search);
		}

		$dataManualPayment = $dataManualPayment
        		->orderBy('id','desc')
        		->paginate(10,'query');

        foreach ($dataManualPayment as $key => $item) {               
        	$dataManualPayment[$key]["user"] = $this->userModel->where('id',$item['user_id'])->first();
        	$dataManualPayment[$key]["course"] = $this->courseModel->where('id',$item['course_id'])->first();
        }      

		$data = [
        	"manualPayment" => $dataManualPayment,
            "pager" => $this->manualPaymentModel->pager,
            "search" => $this->request->getGet('search')
        ];

		return view("admin/manual-payment",$data);
	}

	public function detail($id){
		if(intval($id) < 1){
			return redirect()->back();
		}

		$manualPayment = $this->manualPaymentModel
			->where('id',$id)
			->first();

		if(!$manualPayment){
			return redirect()->back();
		}

		$course = $this->courseModel
			->where('id',$manualPayment['course_id'])
			->first();

		$user = $this->userModel
			->where('id',$manualPayment['user_id'])
			->first();

		$instructur = $this->instructurModel
			->where('id',$course['instructur_id'])
			->first();

		$historyManualPayment = $this->manualPaymentModel
			->where('course_id',$course['id'])
			->whereNotIn('id',[$manualPayment['id']])
			->orderBy('id','desc')			
			->findAll();

		$paymentLate = Carbon::parse($course['created_at'])
			->addDays($_ENV['app.payment_day'])
			->toDateTimeString();

		$isValidate = $this->manualPaymentModel
			->where('course_id',$course['id'])
			->where('status','validasi')
			->first();

		return view("admin/manual-payment-detail",[
			"manualPayment" => $manualPayment,
			"course" => $course,
			"user" => $user,
			"instructur" => $instructur,
			"historyManualPayment" => $historyManualPayment,
			"paymentLate" => $paymentLate,
			"isValidate" => $isValidate
		]);
	}
}