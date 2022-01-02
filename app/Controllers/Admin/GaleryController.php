<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	GaleryModel
};

class GaleryController extends BaseController{
	private $galeryModel;

	public function __construct(){
		$this->galeryModel = new GaleryModel();
	}

	public function index(){	
		$dataGalery = $this->galeryModel;

		if(!empty($this->request->getGet('search'))){
			$search = input_sanitize($this->request->getGet('search'));

			$dataGalery = $dataGalery
				->orWhere('id',$search)
				->orWhere('title',$search);
		}

		$data = [
        	"galery" => $dataGalery
        		->orderBy('id','desc')
        		->paginate(10,'query'),
            "pager" => $this->galeryModel->pager,
            "search" => $this->request->getGet('search')
        ];

		return view("admin/galery",$data);
	}

	public function add(){
		$rules = [
			"title" => "required",			
			"image1" => "uploaded[image1]|max_size[image1,10024]|mime_in[image1,image/jpg,image/jpeg,image/png]|max_dims[image1,5000,5000]",
		];

		$messages = [
			"title" => [
				"required" => "Judul harus diisi"				
			],
			"image1" => [
				"uploaded" => "Gambar 1 harus diisi",
				"max_size" => "Max gambar 1 10 mb",
				"mime_in" => "Gambar 1 tidak valid",
				"max_dims" => "Dimensi gambar 1 tidak valid"
			]
		];

		if(!empty($this->request->getFile("image2")->getName())){
			$rules = array_merge([
				"image2" => "uploaded[image2]|max_size[image2,10024]|mime_in[image2,image/jpg,image/jpeg,image/png]|max_dims[image2,5000,5000]",
			],$rules);

			$messages = array_merge([
				"image2" => [
					"uploaded" => "Gambar 2 harus diisi",
					"max_size" => "Max gambar 2 10 mb",
					"mime_in" => "Gambar 2 tidak valid",
					"max_dims" => "Dimensi gambar 2 tidak valid"
				]
			],$messages);
		}

		if(!empty($this->request->getFile("image3")->getName())){
			$rules = array_merge([
				"image3" => "uploaded[image3]|max_size[image3,10024]|mime_in[image3,image/jpg,image/jpeg,image/png]|max_dims[image3,5000,5000]",
			],$rules);

			$messages = array_merge([
				"image3" => [
					"uploaded" => "Gambar 3 harus diisi",
					"max_size" => "Max gambar 3 10 mb",
					"mime_in" => "Gambar 3 tidak valid",
					"max_dims" => "Dimensi gambar 3 tidak valid"
				]
			],$messages);
		}

		if(!empty($this->request->getFile("image4")->getName())){
			$rules = array_merge([
				"image4" => "uploaded[image4]|max_size[image4,10024]|mime_in[image4,image/jpg,image/jpeg,image/png]|max_dims[image4,5000,5000]",
			],$rules);

			$messages = array_merge([
				"image4" => [
					"uploaded" => "Gambar 4 harus diisi",
					"max_size" => "Max gambar 4 10 mb",
					"mime_in" => "Gambar 4 tidak valid",
					"max_dims" => "Dimensi gambar 4 tidak valid"
				]
			],$messages);
		}

		if(!empty($this->request->getFile("image5")->getName())){
			$rules = array_merge([
				"image5" => "uploaded[image5]|max_size[image5,10024]|mime_in[image5,image/jpg,image/jpeg,image/png]|max_dims[image5,5000,5000]",
			],$rules);

			$messages = array_merge([
				"image5" => [
					"uploaded" => "Gambar 5 harus diisi",
					"max_size" => "Max gambar 5 10 mb",
					"mime_in" => "Gambar 5 tidak valid",
					"max_dims" => "Dimensi gambar 5 tidak valid"
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

		$payload = [
			"title" => input_sanitize($this->request->getPost('title')),			
			"images" => array()
		];

		$image = \Config\Services::image();

		if(!empty($this->request->getFile("image1")->getName())){
			$imagePost = $this->request->getFile('image1');

	    	$name = $imagePost->getRandomName();	  

	  		if($image->withFile($imagePost->getTempName())  		   
	        	->fit(500, 300)
	        	->save('./assets/images/galeries/'.$name)){
	  			$payload["images"][] = $name;
			}
		}

		if(!empty($this->request->getFile("image2")->getName())){
			$imagePost = $this->request->getFile('image2');

	    	$name = $imagePost->getRandomName();	  

	  		if($image->withFile($imagePost->getTempName())  		   
	        	->fit(500, 300)
	        	->save('./assets/images/galeries/'.$name)){
	  			$payload["images"][] = $name;
			}
		}

		if(!empty($this->request->getFile("image3")->getName())){
			$imagePost = $this->request->getFile('image3');

	    	$name = $imagePost->getRandomName();	  

	  		if($image->withFile($imagePost->getTempName())  		   
	        	->fit(500, 300)
	        	->save('./assets/images/galeries/'.$name)){
	  			$payload["images"][] = $name;
			}
		}

		if(!empty($this->request->getFile("image4")->getName())){
			$imagePost = $this->request->getFile('image4');

	    	$name = $imagePost->getRandomName();	  

	  		if($image->withFile($imagePost->getTempName())  		   
	        	->fit(500, 300)
	        	->save('./assets/images/galeries/'.$name)){
	  			$payload["images"][] = $name;
			}
		}

		if(!empty($this->request->getFile("image5")->getName())){
			$imagePost = $this->request->getFile('image5');

	    	$name = $imagePost->getRandomName();	  

	  		if($image->withFile($imagePost->getTempName())  		   
	        	->fit(500, 300)
	        	->save('./assets/images/galeries/'.$name)){
	  			$payload["images"][] = $name;
			}
		}

		$payload["images"] = json_encode($payload['images']);
	
		if($this->galeryModel->insert($payload)){
			return redirect()->back()->with("fallback",[
				"message" => "success",
				"success" => "Berhasil menambah galery"
			]);
		}

		return redirect()->back()->with("fallback",[
			"message" => "failed",
			"failed" => "Terjadi Kesalahan"
		]);
	}

	public function delete($id){
		if(intval($id) < 1){
			return redirect()->back();
		}

		$dataGalery = $this->galeryModel->where('id',$id)->first();

		if(!$dataGalery){
			return redirect()->back();
		}
	
		if($this->galeryModel->delete($id)){
			foreach (json_decode($dataGalery['images']) as $item) {			
				$filePath = "./assets/images/galeries/".$item;

				if(file_exists($filePath)){
					unlink($filePath);
				}		
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
}