<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Carbon\Carbon;
use App\Models\{
	ConfigModel,
	PackageModel,
	InstructurModel
};

class BaseController extends Controller
{

	protected $helpers = [];

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);

   		setLocale(LC_ALL,"id_ID.utf8");

        Carbon::setLocale("id_ID.utf8");
        
        date_default_timezone_set('Asia/Jakarta');

		helper(['input','time','star','text']);

		$this->session = \Config\Services::session();
		
		$this->validation = \Config\Services::validation();
		
		$this->db = \Config\Database::connect();	

		$configModel = new ConfigModel();

		foreach($configModel->findAll() as $item){
			$_ENV['app.'.$item['name']] = $item['value'];
		}

		$instructurModel = new InstructurModel();
		$packageModel = new PackageModel();

		$_ENV['menu.instructur'] = $instructurModel
			->selectCount('id')
			->where('status','active')
			->first()['id'];

		$_ENV['menu.package'] = $packageModel
			->selectCount('id')
			->where('status','active')
			->first()['id'];
	}

}
