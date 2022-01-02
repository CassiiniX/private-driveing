<?php namespace App\Controllers;

use App\Models\{
	UserModel
};
use Bcrypt\Bcrypt;

class AuthController extends BaseController
{
	private $userModel;
	private $bcrypt;

	public function __construct(){
		$this->userModel = new UserModel();
		$this->bcrypt = new Bcrypt();
	}

	public function signin(){	
		$this->validation->setRules([
			"email" => "required|valid_email",
			"password"	=> "required|min_length[8]",
		],[			
			"email" => [
				"required"	=> "Email harus diisi",
				"valid_email" => "Email tidak valid",
			],
			"password" => [
				"required"	 => "Password harus diisi",
				"min_length"	=> "Password min 8 digit"
			]			
		]);

		$this->validation->withRequest($this->request)->run();

		if(count($this->validation->getErrors())){
			return redirect()->to("/signin")->with("fallback",[
				"message" => "failed",
				"failed" => $this->validation->getErrors()[array_keys($this->validation->getErrors())[0]]
			]);
		}

		$dataUser = $this->userModel
			->where('email',input_sanitize($this->request->getPost('email')))
			->first();

		if(!$dataUser){
			return redirect()->to("/signin")->with("fallback",[
				"message" => "failed",
				"failed" => "Email tidak ditemukan"
			]);
		}

		if(!$this->bcrypt->verify(htmlspecialchars(input_sanitize($this->request->getPost('password'))),$dataUser['password'])){
			return redirect()->to("/signin")->with("fallback",[
				"message" => "failed",
				"failed" => "Password tidak ditemukan"
			]);		
		}

		unset($dataUser['password']);

		$this->session->set('user',$dataUser);

		return redirect()->to($dataUser['role'] == "admin" ? "/admin" : "/user")->with("fallback",[
			"message" => "success",
			"success" => "Berhasil masuk"
		]);
	}

	public function signup(){
		$this->validation->setRules([
			"username" => "required|is_unique[users.username]",
			"email" => "required|valid_email|is_unique[users.email]",
			"password"	=> "required|min_length[8]",
			"phone" => "required|is_unique[users.phone]|is_natural|min_length[10]"
		],[
			"username" => [
				"required" => "Username harus diisi",
				"is_unique" => "Username telah terpakai"
			],
			"email" => [
				"required"	=> "Email harus diisi",
				"valid_email" => "Email tidak valid",
				"is_unique" => "Email telah terpakai"
			],
			"password" => [
				"required"	 => "Password harus diisi",
				"min_length"	=> "Password min 8 digit"
			],
			"phone" => [
				"required" => "No Telp harus diisi",
				"is_unique" => "No Telp telah terpakai",
				"is_natural" => "No Telp tidak valid",
				"min_length" => "No Telp min 10 digit"
			]
		]);

		$this->validation->withRequest($this->request)->run();

		if(count($this->validation->getErrors())){
			return redirect()->to("/signup")->with("fallback",[
				"message" => "failed",
				"failed" => $this->validation->getErrors()[array_keys($this->validation->getErrors())[0]]
			]);
		}
	
		$payload = [
			"username" => str_replace(" ","-",input_sanitize($this->request->getPost('username'))),
			"email" => input_sanitize($this->request->getPost('email')),
			"password" => $this->bcrypt->hash(input_sanitize($this->request->getPost('password'))),
			"phone" => input_sanitize($this->request->getPost("phone"))
		];		

		if($this->userModel->insert($payload)){
			return redirect()->to("/signin")->with("fallback",[
				"message" => "success",
				"success" => "Berhasil membuat akun"
			]);
		}

		return redirect()->to("/signup")->with("fallback",[
			"message" => "failed",
			"failed" => "Terjadi Kesalahan"
		]);
	}

	public function logout(){
		$this->session->destroy();

		return redirect()->to("/");
	}
}