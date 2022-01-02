<?php namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\{
	CourseModel
};
use Carbon\Carbon;

class HomeController extends BaseController
{
	private $courseModel;

	public function __construct(){
		$this->courseModel = new CourseModel();
	}

	public function index(){			
		$course = $this->courseModel
			->where('user_id',session('user')['id'])
			->whereIn('status',['pending','payment','waiting','running'])
			->first();

		return view("user/home",[
			"course" => $course
		]);
	}
}