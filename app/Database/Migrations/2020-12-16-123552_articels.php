<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Articels extends Migration
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
            'image'		  => [
            		'type'			 => 'VARCHAR',
                    'constraint'     => 255,
            		'default'		 => 'default.png',
            ],
            'content'	  => [
            		'type'			 => 'LONGTEXT'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('articels');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('articels');
	}
}
