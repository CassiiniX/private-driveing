<?php namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\{
	UserModel
};
use Bcrypt\Bcrypt;

class ProfilController extends BaseController
{
	private $bcrypt;
	private $userModel;

	public function __construct(){
		$this->bcrypt = new Bcrypt();
		$this->userModel =  new UserModel();
	}

	public function index(){	
		return view("user/profil");
	}

	public function updateData(){
		$rules = [
			"email" => "required|valid_email|is_unique[users.email,id,".session('user')['id']."]",
			"password_confirm"	=> "required|min_length[8]",
			"phone" => "required|is_unique[users.phone,id,".session('user')['id']."]|is_natural|min_length[10]"
		];

		$messages = [
			"email" => [
				"required" => "Email harus diisi",
				"valid_email" => "Email tidak valid",
				"is_unique" => "Email telah terpakai"
			],
			"password_confirm" => [
				"required" => "Password konfirmasi harus diisi",
				"min_length" => "Password konfirmasi min 8 digit"
			],
			"phone" => [
				"required" => "No Telp harus diisi",
				"is_unique" => "No Telp telah terpakai",
				"is_natural" => "No Telp tidak valid",
				"min_length" => "No Telp min 10 digit"
			]
		];

		if(!empty($this->request->getPost('password'))){
			$rules = array_merge([
				"password" => "min_length[8]"
			],$rules);

			$messages = array_merge([
				"password" => [
					"min_length" => "Password min 8 digit"
				]
			],$messages);
		}

		$this->validation->setRules($rules,$messages);

		$this->validation->withRequest($this->request)->run();

		if(count($this->validation->getErrors())){
			return redirect()->to("/user/profil")->with("fallback",[
				"message" => "failed",
				"failed" => $this->validation->getErrors()[array_keys($this->validation->getErrors())[0]]
			]);
		}
		
		$user = $this->userModel
			->where('id',session('user')['id'])
			->first();

		if(!$this->bcrypt->verify(input_sanitize($this->request->getPost('password_confirm')),$user['password'])){
			return redirect()->to("/user/profil")->with("fallback",[
				"message" => "failed",
				"failed" => "Password konfirmasi tidak valid"
			]);
		}

		$payload = [
			"email" => input_sanitize($this->request->getPost('email')),
			"phone" => input_sanitize($this->request->getPost("phone"))
		];

		if(!empty($this->request->getPost('password'))){
			$payload["password"] = $this->bcrypt->hash(input_sanitize($this->request->getPost('password')));
		}

		if($this->userModel->update(session('user')['id'],$payload)){			
			$this->setSessionUser();

			return redirect()->to("/user/profil")->with("fallback",[
				"message" => "success",
				"success" => "Berhasil update data"
			]);
		}	

		return redirect()->to("/user/profil")->with("fallback",[
			"message" => "failed",
			"failed" => "Terjadi Kesalahan"
		]);
	}

	public function updatePhoto(){	
		$this->validation->setRules([
			"photo" => "uploaded[photo]|max_size[photo,10024]|mime_in[photo,image/jpg,image/jpeg,image/png]|max_dims[photo,5000,5000]"
		],[
			"photo" => [
				"uploaded" => "Gambar harus diisi",
				"max_size" => "Max gambar 10 mb",
				"mime_in" => "Gambar tidak valid",
				"max_dims" => "Dimensi gambar tidak valid"
			]
		]);

		$this->validation->withRequest($this->request)->run();

		if(count($this->validation->getErrors())){
			return redirect()->to("/user/profil")->with("fallback",[
				"message" => "failed",
				"failed" => $this->validation->getErrors()[array_keys($this->validation->getErrors())[0]]
			]);
		}

		$photo = $this->request->getFile('photo');

	    $name = $photo->getRandomName();	  

		$image = \Config\Services::image();

  		if($image->withFile($photo->getTempName())  		   
        	->fit(500, 500, 'center')
        	->save('./assets/images/users/'.$name)){

  			$payload = [
  				"photo" => $name
  			];
  		
  			if($this->userModel->update(session('user')['id'],$payload)){  				
  				if(session('user')['photo'] != 'default.png'){						 
  					$filePath = "./assets/images/users/".session('user')['photo'];

					if(file_exists($filePath)){
						unlink($filePath);
					}						
  				}				

  				$this->setSessionUser();

  				return redirect()->to("/user/profil")->with("fallback",[
  					"message" => "success",
  					"success" => "Berhasil merubah gambar"
  				]);
  			}
  		}

  		return redirect()->to("/user/profil")->with("fallback",[
  			"message" => "failed",
  			"error" => "Terjadi Kesalahan"
  		]);
	}

	public function setSessionUser(){		
		$user = $this->userModel
			->where('id',session('user')['id'])
			->first();

     	unset($user['password']);			

		$this->session->set('user',$user);
	}
}