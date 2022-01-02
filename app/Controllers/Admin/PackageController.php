<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	PackageModel
};

class PackageController extends BaseController{
	private $packageModel;

	public function __construct(){
		$this->packageModel = new PackageModel();
	}

	public function index(){
		$dataPackage = $this->packageModel;

		if(!empty($this->request->getGet('search'))){
			$search = input_sanitize($this->request->getGet('search'));

			$dataPackage = $dataPackage
				->orWhere('id',$search)
				->orWhere('name',$search)
				->orWhere("meet",$search)
				->orWhere("cost",$search)
				->orWhere("status",$search);
		}

		$data = [
        	"package" => $dataPackage
        		->orderBy('id','desc')
        		->paginate(10,'query'),
            "pager" => $this->packageModel->pager,
            "search" => $this->request->getGet('search')
        ];

		return view("admin/package",$data);
	}

	public function add(){	
		$this->validation->setRules([
			"name" => "required",
			"meet" => "required|is_natural",
			"cost" => "required|is_natural",
			"status" => "required"
		],[
			"name" => [
				"required" => "Nama harus diisi"
			],
			"meet" => [
				"required" => "Pertemuaan harus diisi",
				"is_natural" => "Pertemuaan tidak valid"
			],
			"cost" => [
				"required" => "Biaya harus diisi",
				"is_natural" => "Biaya tidak valid"
			],
			"status" => [
				"required" => "Status harus diisi"
			]
		]);
	
		$this->validation->withRequest($this->request)->run();

		if(count($this->validation->getErrors())){
			return redirect()->back()->with("fallback",[
				"message" => "failed",
				"failed" => $this->validation->getErrors()[array_keys($this->validation->getErrors())[0]]
			]);
		}		

		if(!in_array(input_sanitize($this->request->getPost("status")),['active','nonactive'])){
			return redirect()->back();
		}

		$payload = [
			"name" => input_sanitize($this->request->getPost("name")),
			"cost" => intval(input_sanitize($this->request->getPost("cost"))),
			"meet" => intval(input_sanitize($this->request->getPost("meet"))),
			"status" => input_sanitize($this->request->getPost("status"))
		];

		if($this->packageModel->insert($payload)){
			return redirect()->back()->with("fallback",[
				"message" => "success",
				"success" => "Berhasil menambah data"
			]);
		}

		return redirect()->back()->with("fallback",[
			"message" => "failed",
			"failed" => "Gagal menambah data" 
		]);	
	}

	public function edit($id){
		if(intval($id) < 1){
			return redirect()->back();
		}
		
		if(!$this->packageModel->where('id',$id)->first()){
			return redirect()->back();
		}
		
		$this->validation->setRules([
			"name" => "required",
			"meet" => "required|is_natural",
			"cost" => "required|is_natural",
			"status" => "required"
		],[
			"name" => [
				"required" => "Nama harus diisi"
			],
			"meet" => [
				"required" => "Pertemuaan harus diisi",
				"is_natural" => "Pertemuaan tidak valid"
			],
			"cost" => [
				"required" => "Biaya harus diisi",
				"is_natural" => "Biaya tidak valid"
			],
			"status" => [
				"required" => "Status harus diisi"
			]
		]);

		$this->validation->withRequest($this->request)->run();

		if(count($this->validation->getErrors())){
			return redirect()->back()->with("fallback",[
				"message" => "failed",
				"failed" => $this->validation->getErrors()[array_keys($this->validation->getErrors())[0]]
			]);
		}		

		if(!in_array(input_sanitize($this->request->getPost("status")),['active','nonactive'])){
			return redirect()->back();
		}

		$payload = [
			"name" => input_sanitize($this->request->getPost("name")),
			"cost" => intval(input_sanitize($this->request->getPost("cost"))),
			"meet" => intval(input_sanitize($this->request->getPost("meet"))),
			"status" => input_sanitize($this->request->getPost("status"))
		];

		if($this->packageModel->update($id,$payload)){
			return redirect()->back()->with("fallback",[
				"message" => "success",
				"success" => "Berhasil mengubah data"
			]);
		}

		return redirect()->back()->with("fallback",[
			"message" => "failed",
			"failed" => "Gagal mengubah data" 
		]);	
	}
}