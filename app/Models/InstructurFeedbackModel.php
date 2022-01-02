<?php
namespace App\Models;

use CodeIgniter\Model;

class InstructurFeedbackModel extends Model{
	protected $table = "instructur_feedbacks";

	protected $primaryKey = "id";

	protected $allowedFields = [		
		"user_id",
		"instructur_id",
		"star",
		"comment",
		"created_at",
		"updated_at"
	];

	protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';
}