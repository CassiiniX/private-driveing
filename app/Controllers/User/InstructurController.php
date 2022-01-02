<?php namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\{
	InstructurModel,
	InstructurFeedbackModel,
	UserModel
};

class InstructurController extends BaseController
{	
	private $instructurModel;
	private $instructurFeedbackModel;
	private $userModel;

	public function __construct(){
		$this->instructurModel = new InstructurModel();
		$this->instructurFeedbackModel = new InstructurFeedbackModel();
		$this->userModel = new UserModel();
	}

	public function index(){	
		$instructur = $this->instructurModel
			->where('status','active')
			->orderBy('id','desc')
			->findAll();

		foreach ($instructur as $key => $item) {

			$instructur[$key]["feedback"] = $this->instructurFeedbackModel
				->where('instructur_id',$item['id'])
				->orderBy('id','desc')
				->findAll();					

			foreach($instructur[$key]['feedback'] as $keyFeedback => $itemFeedback){										
				$instructur[$key]['feedback'][$keyFeedback]['user'] = $this->userModel
					->where('id',$itemFeedback['user_id'])
					->first();
			}						
		}

		return view("user/instructur",[
			"instructur" => $instructur
		]);
	}
}