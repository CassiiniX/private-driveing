<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	InstructurModel,
	UserModel,
	InstructurFeedbackModel
};

class InstructurFeedbackController extends BaseController{
	private $instructurModel;
	private $userModel;
	private $instructurFeedbackModel;

	public function __construct(){
		$this->instructurModel = new InstructurModel();
		$this->userModel = new UserModel();
		$this->instructurFeedbackModel = new InstructurFeedbackModel();
	}

	public function index(){	
		$dataInstructurFeedback = $this->instructurFeedbackModel;

		if(!empty($this->request->getGet('search'))){
			$search = input_sanitize($this->request->getGet('search'));

			$dataInstructurFeedback  = $dataInstructurFeedback 
				->orWhere('id',$search)
				->orWhere('comment',$search)
				->orWhere('star',$search);
		}

		$dataInstructurFeedback = $dataInstructurFeedback
        		->orderBy('id','desc')
        		->paginate(10,'query');

        foreach ($dataInstructurFeedback as $key => $item) {        	
        	$dataInstructurFeedback[$key]['user'] = $this->userModel->where('id',$item['user_id'])->first();
        	$dataInstructurFeedback[$key]['instructur'] = $this->instructurModel->where('id',$item['instructur_id'])->first();
        }

		$data = [
        	"instructurFeedback" => $dataInstructurFeedback,
            "pager" => $this->instructurFeedbackModel->pager,
            "search" => $this->request->getGet('search')
        ];
	
		return view("admin/instructur-feedback",$data);
	}

	public function delete($id){
		if(intval($id) < 1){
			return redirect()->back();
		}	
		
		$dataInstructurFeedback = $this->instructurFeedbackModel->where('id',$id)->first();

		if(!$dataInstructurFeedback){
			return redirect()->back();
		}

		if($this->instructurFeedbackModel->delete($id)){			
			return redirect()->back()->with("fallback",[
				"message" => "success",
				"success" => "Berhasil menghapus data"
			]);
		}

		return redirect()->back()->with("fallback",[
			"message" => "failed",
			"failed" => "Gagal menghapus data"
		]);
	}
}