<?php namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\{
	PackageModel,
	InstructurModel
};
use Carbon\Carbon;

class PackageController extends BaseController
{
	private $packageModel;
	private $instructurModel;

	public function __construct(){
		$this->packageModel = new PackageModel();
		$this->instructurModel = new InstructurModel();
	}

	public function index(){	
	
		$package = $this->packageModel
			->where('status','active')
			->orderBy('id','desc')
			->findAll();

		$instructur = $this->instructurModel
			->where('status','active')
			->orderBy('id','desc')
			->get()
			->getResult('array');

		$minDate = Carbon::now()->addDays(intval($_ENV['app.payment_day'])+1)->format("Y-m-d");
				
		return view("user/package",[
			"package" => $package,
			"instructur" => $instructur,
			"minDate" => $minDate
		]);
	}
}