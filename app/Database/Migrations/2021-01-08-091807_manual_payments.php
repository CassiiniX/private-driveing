<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
    
class ManualPayments extends Migration
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
            'course_id'	=> [
            		'type'			 => 'INT',
            		'constraint'	 => 11,
            		'unsigned'		 => true,
            ],
            'proof' => [
            		'type'			 => "TEXT"
            ],
            'description' => [
            		'type'			 => "TEXT"
            ],
            'status'       => [
                    'type'           => 'ENUM',
                    'constraint'     => ['failed','success','validasi'],
                    'default'		 => 'validasi'
            ],                       
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey('user_id','users','id');
        
		$this->forge->addForeignKey('course_id','courses','id');

        $this->forge->createTable('manual_payments');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('manual_payments');
	}
}
