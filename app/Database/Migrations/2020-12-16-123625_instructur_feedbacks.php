<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InstructurFeedbacks extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id'          => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'user_id'     => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
            ],
            'instructur_id'	=> [
            		'type'			 => 'INT',
            		'constraint'	 => 11,
            		'unsigned'		 => true,
            ],
            'star'       => [
                    'type'           => 'INT',
                    'constraint'     => 5,                    
            ],           
            'comment'	  => [
            		'type'			 => 'TEXT'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('user_id','users','id');
        
		$this->forge->addForeignKey('instructur_id','instructurs','id');

        $this->forge->createTable('instructur_feedbacks');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('instructur_feedbacks');
	}
}
