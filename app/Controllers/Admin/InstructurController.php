<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	InstructurModel
};

class InstructurController extends BaseController{
	private $instructurModel;

	public function __construct(){
		$this->instructurModel = new InstructurModel();
	}

	public function index(){
		$dataInstructur = $this->instructurModel;

		if(!empty($this->request->getGet('search'))){
			$search = input_sanitize($this->request->getGet('search'));

			$dataInstructur = $dataInstructur
				->orWhere('id',$search)
				->orWhere('name',$search)
				->orWhere("email",$search)
				->orWhere("phone",$search)
				->orWhere("star",$search)
				->orWhere('status',$search);			
		}

		$data = [
        	"instructur" => $dataInstructur
        		->orderBy('id','desc')
        		->paginate(10,'query'),
            "pager" => $this->instructurModel->pager,
            "search" => $this->request->getGet('search')
        ];

		return view("admin/instructur",$data);
	}

	public function add(){
		$rules = [
			"name" => "required",
			"email" => "required|valid_email|is_unique[users.email]",
			"phone" => "required|is_unique[users.phone]|is_natural|min_length[10]",			
			"status" => "required"
		];

		$messages = [
			"name" => [
				"required" => "Judul harus diisi"				
			],
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
			"status" => [
				"required" => "Status harus diisi"
			]
		];

		if(!empty($this->request->getFile("photo")->getName())){
			$rules = array_merge([
				"photo" => "uploaded[photo]|max_size[photo,10024]|mime_in[photo,image/jpg,image/jpeg,image/png]|max_dims[photo,5000,5000]",
			],$rules);

			$messages = array_merge([
				"photo" => [
					"uploaded" => "Gambar harus diisi",
					"max_size" => "Max gambar 10 mb",
					"mime_in" => "Gambar tidak valid",
					"max_dims" => "Dimensi gambar tidak valid"
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

		if(!in_array(input_sanitize($this->request->getPost('status')),["active","nonactive"])){
			return redirect()->back();
		}

		$payload = [
			"name" => input_sanitize($this->request->getPost('name')),
			"email" => input_sanitize($this->request->getPost('email')),
			"phone" => input_sanitize($this->request->getPost('phone')),
			"status" => input_sanitize($this->request->getPost('status'))
		];

		if(!empty($this->request->getFile("photo")->getName())){
			$photo = $this->request->getFile('photo');

	    	$name = $photo->getRandomName();	  

			$image = \Config\Services::image();
			
		  	if($image->withFile($photo->getTempName())  		   
	        	->fit(500, 500, 'center')
        		->save('./assets/images/instructurs/'.$name)){
  				$payload["photo"] = $name;
  			}
  		}
  
  		if($this->instructurModel->insert($payload)){
  			return redirect()->back()->with("fallback",[
  				"message" => "success",
  				"success" => "Berhasil membuat data"
  			]);
  		}

		return redirect()->back()->with("fallback",[
			"message" => "failed",
			"failed" => "Gagal membuat data"
		]);
	}

	public function edit($id){
		if(intval($id) < 1){
			return redirect()->back();			
		}

		$instructur = $this->instructurModel->where('id',$id)->first();

		if(!$instructur){
			return redirect()->back();
		}

		$rules = [
			"name" => "required",
			"email" => "required|valid_email|is_unique[instructurs.email,id,".$id."]",
			"phone" => "required|is_unique[instructurs.phone,id,".$id."]|is_natural|min_length[10]",
			"status" => "required"
		];

		$messages = [
			"name" => [
				"required" => "Nama harus diisi"
			],
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
			"status" => [
				"required" => "Status harus diisi"
			]
		];
	
		if(!empty($this->request->getFile("photo")->getName())){
			$rules = array_merge([
				"photo" => "uploaded[photo]|max_size[photo,10024]|mime_in[photo,image/jpg,image/jpeg,image/png]|max_dims[photo,5000,5000]",
			],$rules);

			$messages = array_merge([
				"photo" => [
					"uploaded" => "Gambar harus diisi",
					"max_size" => "Max gambar 10 mb",
					"mime_in" => "Gambar tidak valid",
					"max_dims" => "Dimensi gambar tidak valid"
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
		
		if(!in_array(input_sanitize($this->request->getPost('status')),["active","nonactive"])){
			return redirect()->back();
		}

		$payload = [
			"name" => input_sanitize($this->request->getPost('name')),
			"email" => input_sanitize($this->request->getPost('email')),
			"phone" => input_sanitize($this->request->getPost('phone')),
			"status" => input_sanitize($this->request->getPost('status'))
		];

		if(!empty($this->request->getFile("photo")->getName())){
			$photo = $this->request->getFile('photo');

	    	$name = $photo->getRandomName();	  

			$image = \Config\Services::image();
			
		  	if($image->withFile($photo->getTempName())  		   
	        	->fit(500, 500, 'center')
        		->save('./assets/images/instructurs/'.$name)){
  				$payload["photo"] = $name;
  			}
  		}

  		if($this->instructurModel->update($id,$payload)){
  			if(!empty($this->request->getFile("photo")->getName())){
  				if($instructur['photo'] != "default.png"){
  					$filePath = "./assets/images/instructurs/".$instructur['photo'];

					if(file_exists($filePath)){
						unlink($filePath);
					}		
				}
			}

  			return redirect()->back()->with("fallback",[
  				"message" => "success",
  				"success" => "Berhasil mengupdate data"
  			]);
  		}

		return redirect()->back()->with("fallback",[
			"message" => "failed",
			"failed" => "Gagal mengupdate data"
		]);
	}
}