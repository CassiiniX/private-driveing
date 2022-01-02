<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Packages extends Migration
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
            'meet'		 => [
            		'type'			 => 'INT',
            		'constraint'	 => 11
            ],
            'cost' => [
                    'type'			 => 'INT',
            		'constraint'	 => 11
            ],             
            'status' => [
            		'type'			=> 'ENUM',
            		'constraint'	=> ['active','nonactive'],
            		'default'		=> 'active'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('packages');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('packages');
	}
}
