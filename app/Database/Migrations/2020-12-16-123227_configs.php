<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Configs extends Migration
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
                    'unique'		 => true
            ],          
            'value' => [
            		'type'			 => 'TEXT',                     
            ],           
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('configs');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('configs');
	}
}
