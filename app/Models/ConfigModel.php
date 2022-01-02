<?php
namespace App\Models;

use CodeIgniter\Model;

class ConfigModel extends Model{
	protected $table = "configs";

	protected $primaryKey = "id";

	protected $allowedFields = [
		"name",
		"value",	
		"created_at",
		"updated_at"
	];

	protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';
}