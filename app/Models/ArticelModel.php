<?php
namespace App\Models;

use CodeIgniter\Model;

class ArticelModel extends Model{
	protected $table = "articels";

	protected $primaryKey = "id";

	protected $allowedFields = [		
		"title",
		"image",
		"content",
		"created_at",
		"updated_at"
	];

	protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';
}