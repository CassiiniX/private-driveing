<?php
namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model{
	protected $table = "contacts";

	protected $primaryKey = "id";

	protected $allowedFields = [
		"name",
		"email",	
		"phone",
		"message",
		"created_at",
		"updated_at"
	];

	protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';
}