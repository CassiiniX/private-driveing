<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	ConfigModel
};

class SettingController extends BaseController{
	private $configModel;

	public function __construct(){
		$this->configModel = new ConfigModel();
	}

	public function index(){
		return view("admin/setting");
	}

	public function edit(){
		$this->validation->setRules([
			"site_name" => "required",
			"course_max_hour" => "required|is_natural",
			"payment_day" => "required|is_natural",
		],[
			"site_name" => [
				"required" => "Nama website harus diisi"
			],
			"course_max_hour" => [
				"required" => "Waktu Max Kursus harus diisi",
				"is_natural" => "Waktu Max Kursus tidak valid"
			],
			"payment_day" => [
				"required" => "Kurun Waktu Pembayaran harus diisi",
				"is_natural" => "Kurun Waktu Pembayaran tidak valid"
			]
		]);

		$this->validation->withRequest($this->request)->run();

		if(count($this->validation->getErrors())){
			return redirect()->back()->with("fallback",[
				"message" => "failed",
				"failed" => $this->validation->getErrors()[array_keys($this->validation->getErrors())[0]]
			]);
		}

		$this->configModel->where("name","site_name")
		->set([
			"value" => input_sanitize($this->request->getPost("site_name"))
		])
		->update();

		$this->configModel->where("name","course_max_hour")
		->set([
			"value" => intval(input_sanitize($this->request->getPost("course_max_hour")))
		])
		->update();

		$this->configModel->where("name","payment_day")
		->set([
			"value" => intval(input_sanitize($this->request->getPost("payment_day")))
		])
		->update();

		return redirect()->back()->with("fallback",[
			"message" => "success",
			"success" => "Berhasil mengupdate data"
		]);
	}
}	