<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	UserModel
};
use Bcrypt\Bcrypt;

class UserController extends BaseController{
	private $userModel;
	private $bcrypt;

	public function __construct(){
		$this->userModel = new UserModel();
		$this->bcrypt = new Bcrypt();					
	}

	public function index(){	
		$dataUser = $this->userModel;

		if(!empty($this->request->getGet('search'))){
			$search = input_sanitize($this->request->getGet('search'));

			$dataUser = $dataUser
				->orWhere('id',$search)
				->orWhere('username',$search)
				->orWhere("email",$search)
				->orWhere("phone",$search)
				->orWhere("role",$search);
				
		}

		$data = [
        	"user" => $dataUser
        		->orderBy('id','desc')
        		->paginate(10,'query'),
            "pager" => $this->userModel->pager,
            "search" => $this->request->getGet('search')
        ];

		return view("admin/user",$data);
	}

	public function edit($id){
		if(intval($id) < 1){
			return redirect()->back();			
		}
		
		$user = $this->userModel->where('id',$id)->first();

		if(!$user){
			return redirect()->back();
		}

		$rules = [
			"email" => "required|valid_email|is_unique[users.email,id,".$id."]",
			"phone" => "required|is_unique[users.phone,id,".$id."]|is_natural|min_length[10]",
			"role" => "required"
		];

		$messages = [
			"email" => [
				"required" => "Email harus diisi",
				"valid_email" => "Email tidak valid",
				"is_unique" => "Email telah terpakai"
			],			
			"phone" => [
				"required" => "No Telp harus diisi",
				"is_unique" => "No Telp telah terpakai",
				"is_natural" => "No Telp tidak valid",
				"min_length" => "No Telp min 10 digit"
			],
			"role" => [
				"required" => "Role harus diisi"
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
			return redirect()->back()->with("fallback",[
				"message" => "failed",
				"failed" => $this->validation->getErrors()[array_keys($this->validation->getErrors())[0]]
			]);
		}
		
		if(!in_array(input_sanitize($this->request->getPost("role")),["user","admin"])){
			return redirect()->back();
		}	

		$payload = [
			"email" => input_sanitize($this->request->getPost('email')),
			"phone" => input_sanitize($this->request->getPost("phone")),
			"role" => input_sanitize($this->request->getPost('role')),
		];

		if(!empty($this->request->getPost('password'))){
			$payload["password"] = $this->bcrypt->hash(input_sanitize($this->request->getPost('password')));
		}

		if($this->userModel->update($id,$payload)){			
			return redirect()->back()->with("fallback",[
				"message" => "success",
				"success" => "Berhasil update data"
			]);
		}	

		return redirect()->back()->with("fallback",[
			"message" => "failed",
			"failed" => "Gagal update data"
		]);
	}
}