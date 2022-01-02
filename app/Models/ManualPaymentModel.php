<?php
namespace App\Models;

use CodeIgniter\Model;

class ManualPaymentModel extends Model{
	protected $table = "manual_payments";

	protected $primaryKey = "id";

	protected $allowedFields = [
		"user_id",
		"course_id",	
		"proof",
		"description",
		"status",		
		"created_at",
		"updated_at"
	];

	protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';
}