<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contacts extends Migration
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
            'email'      => [
                    'type'           => 'VARCHAR',
                    'constraint'     => 50,                
            ],           
            'phone' 	 => [
            		'type'			 => 'VARCHAR',
            		'constraint'	 => 25
            ],
            'message'	 => [
            		'type'			 => 'TEXT'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('contacts');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('contacts');
	}
}
