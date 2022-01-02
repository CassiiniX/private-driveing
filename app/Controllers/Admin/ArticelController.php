<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	ArticelModel
};

class ArticelController extends BaseController{
	private $articelModel;

	public function __construct(){
		$this->articelModel = new ArticelModel();
	}

	public function index(){
		$dataArticel = $this->articelModel;

		if(!empty($this->request->getGet('search'))){
			$search = input_sanitize($this->request->getGet('search'));

			$dataArticel = $dataArticel
				->orWhere('id',$search)
				->orWhere('title',$search)
				->orWhere('content',$search);
		}

		$data = [
        	"articel" => $dataArticel
        		->orderBy('id','desc')
        		->paginate(10,'query'),
            "pager" => $this->articelModel->pager,
            "search" => $this->request->getGet('search')
        ];

		return view("admin/articel",$data);
	}

	public function delete($id){
		if(intval($id) < 1){
			return redirect()->back();
		}	
		
		$dataArticel = $this->articelModel->where('id',$id)->first();

		if(!$dataArticel){
			return redirect()->back();
		}

		if($this->articelModel->delete($id)){
			$filePath = "./assets/images/articels/".$dataArticel['image'];

			if(file_exists($filePath)){
				unlink($filePath);
			}		

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

	public function add(){	
		$this->validation->setRules([
			"title" => "required",
			"content" => "required",
			"image" => "uploaded[image]|max_size[image,10024]|mime_in[image,image/jpg,image/jpeg,image/png]|max_dims[image,5000,5000]"
		],[
			"title" => [
				"required" => "Judul harus diisi"				
			],
			"content" => [
				"required" => "Kontent harus disi"
			],
			"image" => [
				"uploaded" => "Gambar harus diisi",
				"max_size" => "Max gambar 10 mb",
				"mime_in" => "Gambar tidak valid",
				"max_dims" => "Dimensi gambar tidak valid"
			]
		]);

		$this->validation->withRequest($this->request)->run();

		if(count($this->validation->getErrors())){
			return redirect()->back()->with("fallback",[
				"message" => "failed",
				"failed" => $this->validation->getErrors()[array_keys($this->validation->getErrors())[0]]
			]);
		}

		$imagePost = $this->request->getFile('image');

	    $name = $imagePost->getRandomName();	  

		$image = \Config\Services::image();		

  		if($image->withFile($imagePost->getTempName())  		   
        	->fit(500, 300)
        	->save('./assets/images/articels/'.$name)){
        		$payload = [
					"title" => input_sanitize($this->request->getPost('title')),
					"content" => $this->request->getPost('content'),
					"image" => $name
				];
  			
				if($this->articelModel->insert($payload)){
					return redirect()->back()->with("fallback",[
						"message" => "success",
						"success" => "Terjadi Kesalahan"
					]);
				}			
		}

		return redirect()->back()->with("fallback",[
			"message" => "failed",
			"failed" => "Terjadi Kesalahan"
		]);
	}

	public function edit($id){
		if(intval($id) < 1){
			return redirect()->back();
		}

		$dataArticel = $this->articelModel->where('id',$id)->first();

		if(!$dataArticel){
			return redirect()->back();
		}

		$rules = [
			"title" => "required",
			"content" => "required"
		];

		$messages = [
			"title" => [
				"required" => "Judul harus diisi"				
			],
			"content" => [
				"required" => "Kontent harus disi"
			]
		];
	
		if(!empty($this->request->getFile('image')->getName())){
			$rules = array_merge($rules,[
				"image" => "uploaded[image]|max_size[image,10024]|mime_in[image,image/jpg,image/jpeg,image/png]|max_dims[image,5000,5000]"
			]);

			$messages = array_merge($messages,[
				"image" => [
					"uploaded" => "Gambar harus diisi",
					"max_size" => "Max gambar 10 mb",
					"mime_in" => "Gambar tidak valid",
					"max_dims" => "Dimensi gambar tidak valid"
				]
			]);
		}
		
		$this->validation->setRules($rules,$messages);

		$this->validation->withRequest($this->request)->run();

		if(count($this->validation->getErrors())){
			return redirect()->back()->with("fallback",[
				"message" => "failed",
				"failed" => $this->validation->getErrors()[array_keys($this->validation->getErrors())[0]]
			]);
		}

		$payload = [
			"title" => input_sanitize($this->request->getPost('title')),
			"content" => $this->request->getPost('content'),
		];

		if(!empty($this->request->getFile('image')->getName())){
			$imagePost = $this->request->getFile('image');

	    	$name = $imagePost->getRandomName();	  
	    	
			$image = \Config\Services::image();

	  		if($image->withFile($imagePost->getTempName())  		   
	        	->fit(500, 300)
	        	->save('./assets/images/articels/'.$name)){
	  			$payload["image"] = $name;
			}
		}

		if($this->articelModel->update($id,$payload)){
			if(!empty($this->request->getFile('image')->getName())){				
				$filePath = "./assets/images/articels/".$dataArticel['image'];

				if(file_exists($filePath)){
					unlink($filePath);
				}	
			}

			return redirect()->back()->with("fallback",[
				"message" => "success",
				"success" => "Berhasil mengupdate data"
			]);
		}

		return redirect()->back()->with("fallback",[
			"message" => "failed",
			"failed" => "Terjadi Kesalahan"
		]);
	}
}