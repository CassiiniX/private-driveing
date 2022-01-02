<?php
namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model{
	protected $table = "courses";

	protected $primaryKey = "id";

	protected $allowedFields = [
		"user_id",
		"instructur_id",		
		"meet",	
		"cost",
		"hour",
		"date_start",
		"date_end",
		"clock_start",
		"clock_end",
		"status",		
		"created_at",
		"updated_at"
	];

	protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';
}