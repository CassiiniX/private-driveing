<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\{
	ContactModel
};

class ContactController extends BaseController{
	private $contactModel;

	public function __construct(){
		$this->contactModel  = new ContactModel();
	}

	public function index(){		
		$dataContact = $this->contactModel;

		if(!empty($this->request->getGet('search'))){
			$search = input_sanitize($this->request->getGet('search'));

			$dataContact = $dataContact
				->orWhere('id',$search)
				->orWhere('name',$search)
				->orWhere('email',$search)
				->orWhere('phone',$search)
				->orWhere('message',$search);
		}

		$data = [
        	"contact" => $dataContact
        		->orderBy('id','desc')
        		->paginate(10,'query'),
            "pager" => $this->contactModel->pager,
            "search" => $this->request->getGet('search')
        ];

		return view("admin/contact",$data);
	}

	public function delete($id){
		if(intval($id) < 1){
			return redirect()->back();
		}	
	
		$dataContact = $this->contactModel->where('id',$id)->first();

		if(!$dataContact){
			return redirect()->back();
		}

		if($this->contactModel->delete($id)){			
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