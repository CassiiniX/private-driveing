<?php namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\{
	CourseModel,
	InstructurModel,
	ManualPaymentModel
};
use Carbon\Carbon;

class CourseController extends BaseController
{
	private $courseModel;
	private $instructurModel;
	private $manualPaymentModel;

	public function __construct(){
		$this->courseModel = new CourseModel();
		$this->instructurModel = new InstructurModel();
		$this->manualPaymentModel = new ManualPaymentModel();
	}

	public function index(){ 
		$course = $this->courseModel
			->where('user_id',session('user')['id'])
			->whereIn('status',['pending','payment','waiting','running'])
			->first();

		$theData = [];

		$theData['course'] = $course;

		if($course){
			$instructur = $this->instructurModel
				->where('id',$course['instructur_id'])
				->first();

			$manualPayment = $this->manualPaymentModel
				->where('user_id',session('user')['id'])
				->where('course_id',$course['id'])
				->findAll();

			$paymentLate = Carbon::parse($course['created_at'])
				->addDays($_ENV['app.payment_day'])
				->toDateTimeString();

			$theData['instructur'] = $instructur;
			$theData['manualPayment'] = $manualPayment;
			$theData['paymentLate'] = $paymentLate;
		}

		return view("user/course",$theData);
	}

	public function history(){
        $data = [
        	"course" => $this->courseModel
				->where('user_id',session('user')['id'])
				->orderBy('id','desc')
            	->paginate(3,'query'),
            "pager" => $this->courseModel->pager
        ];

        foreach($data['course'] as $key => $item){        	
        	$data['course'][$key]['instructur'] = $this->instructurModel
				->where('id',$item['instructur_id'])
				->first();;			
        }

        return view("user/course-history",$data);
	}

	public function detail($id){
		if(intval($id) < 1){
			return redirect()->back();
		}
				
		$course = $this->courseModel
			->where('user_id',session('user')['id'])
			->whereNotIn('status',['pending','payment','waiting','running'])
			->where('id',$id)
			->first();

		if(!$course){
			return redirect()->to("/user/course");
		}
	
		$instructur = $this->instructurModel
			->where('id',$course['instructur_id'])
			->first();

		$manualPayment = $this->manualPaymentModel
			->where('user_id',session('user')['id'])
			->where('course_id',$course['id'])
			->findAll();

		$paymentLate = Carbon::parse($course['created_at'])
			->addDays($_ENV['app.payment_day'])
			->toDateTimeString();	

		return view("user/course-detail",[
			"course" => $course,
			"instructur" => $instructur,
			"manualPayment" => $manualPayment,
			"paymentLate" => $paymentLate
		]);
	}

	public function cancel($id){
		if(intval($id) < 1){
			return redirect()->back();
		}
	
		$course = $this->courseModel
			->where('user_id',session('user')['id'])
			->whereIn('status',['pending','payment','waiting','running'])
			->where('id',$id)
			->first();

		if(!$course){
			return redirect()->to("/user/course");
		}

		$this->db->transStart();

		if($this->courseModel->update($course['id'],[
			"status" => $course['status'] == "running" ? "failed" : "canceled"
		])){
			$this->instructurModel->update($course['instructur_id'],[
				"status" => "active"
			]);

			$this->manualPaymentModel->where('course_id', $course['id'])
			 	->where('status','validasi')
    			->set([
    				'status' => 'failed'
    			])
    			->update();		

			$this->db->transComplete();

			return redirect()->to("/user/course-history")->with("fallback",[
				"message" => "success",
				"success" => "Berhasil membatalkan kursus"
			]);
		}

		return redirect()->to("/user/course")->with("fallback",[
			"message" => "failed",
			"failed" => "Gagal membatalkan kursus"
		]);
	}
}