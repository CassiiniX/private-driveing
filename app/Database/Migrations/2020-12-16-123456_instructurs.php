<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Instructurs extends Migration
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
            'name'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => 50,
            ],
            'email' => [
                    'type'           => 'VARCHAR',                        
                    'constraint'     => 50,
                    'unique'		 => true
            ],           
            'phone' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => 25,
                    'unique'         => true,
            ],
            'star'   => [   
                    'type'          => 'INT',
                    'constraint'    => 5,
                    'default'       => 0
            ],
            'photo'  => [
            		'type'			 => 'VARCHAR',
            		'constraint' 	 => 50,
            		'default'		 => 'default.png'
            ],        
            'status' => [
            		'type'			=> 'ENUM',
            		'constraint'	=> ['active','nonactive','hire'],
            		'default'		=> 'active'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('instructurs');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('instructurs');
	}
}
