<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Galeries extends Migration
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
            'title'       => [
                    'type'           => 'VARCHAR',
                    'constraint'     => 50,
            ],
            'images'		  => [
            		'type'			 => 'VARCHAR',   
                    'constraint'     => 255,
                    'null'           => true
            ],        
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('galeries');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('galeries');
	}
}
