<?php namespace App\Controllers;

use App\Models\{
	ArticelModel,
	GaleryModel,
	ContactModel
};

class HomeController extends BaseController
{
	private $contactModel;
	private $articelModel;
	private $galeryModel;

	public function __construct(){
		$this->contactModel = new ContactModel();
		$this->articelModel = new ArticelModel();
		$this->galeryModel = new GaleryModel();
	}

	public function index()
	{
		$_ENV['agent'] = $this->request->getUserAgent();
	
		$data = [
			"dataArticel" => $this->articelModel->findAll(),
			"dataGalery" => $this->galeryModel->findAll()
		];

		return view('home',$data);
	}

	public function signin(){
		return view("signin");
	}

	public function signup(){
		return view("signup");
	}

	public function contactUs(){			
		$this->validation->setRules([
			"name" => "required",
			"email" => "required|valid_email",
			"phone"	=> "required|is_natural",
			"message" => "required"
		],[
			"name" => [
				"required" => "Nama harus diisi"
			],
			"email" => [
				"required" => "Email harus diisi",
				"valid_email" => "Email tidak valid"
			],
			"phone" => [
				"required"	=> "No Telp harus diisi",
				"is_natural" => "No Telp tidak valid"
			],
			"message" => [
				"required"  =>  "Pesan harus diisi"
			]
		]);

		$this->validation->withRequest($this->request)->run();

		if(count($this->validation->getErrors())){
			return redirect()->to("/")->with("fallback",[
				"message" => "failed",
				"failed" => $this->validation->getErrors()[array_keys($this->validation->getErrors())[0]]
			]);
		}

		$paylod = [
			"name" =>  input_sanitize($this->request->getPost('name')),
			"email"	=> input_sanitize($this->request->getPost('email')),
			"phone"	=> input_sanitize($this->request->getPost('phone')),
			"message" => input_sanitize($this->request->getPost('message'))
		];

		if($this->contactModel->insert($paylod)){
			return redirect()->to("/")->with("fallback",[
				"message" => "success",
				"success" => "Berhasil mengirim pesan"
			]);
		}

		return redirect()->to("/")->with("fallback",[
			"message" => "failed",
			"failed" => "Terjadi Kesalahan"
		]);
	}
}
