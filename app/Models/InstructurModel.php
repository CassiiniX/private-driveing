<?php
namespace App\Models;

use CodeIgniter\Model;

class InstructurModel extends Model{
	protected $table = "instructurs";

	protected $primaryKey = "id";

	protected $allowedFields = [
		"name",
		"email",	
		"phone",
		"star",
		"photo",
		"status",
		"created_at",
		"updated_at"
	];

	protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';
}