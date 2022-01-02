<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Courses extends Migration
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
            'user_id'	 => [
            		'type' 			 => 'INT',
            		'constraint'	 => 11,
            		'unsigned'		 => true
            ],
            'instructur_id'	=> [
            		'type'			 => 'INT',
            		'constraint'	 => 11,
            		'unsigned'		 => true,
            ],       
            'meet'		 => [
            		'type'			 => 'INT',
            		'constraint'	 => 11
            ],
            'cost' => [
                    'type'			 => 'INT',
            		'constraint'	 => 11
            ],     
            'hour'	 => [
            		'type'			=> 'INT',
            		'constraint' 	=> 11
            ],           
            'date_start'	=> [
            		'type'			=> 'DATE',            		
            ],          
            'clock_start'	 => [
            		'type'			=> 'TIME'
            ],          
            'status' => [
            		'type'			=> 'ENUM',
            		'constraint'	=> ['pending','payment','waiting','running','success','failed','canceled','rejected'],
            		'default'		=> 'pending'
            ],                
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('user_id','users','id');

		$this->forge->addForeignKey('instructur_id','instructurs','id');

        $this->forge->createTable('courses');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('courses');
	}
}
