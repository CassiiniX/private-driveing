<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\{
	UserModel,
	ContactModel,
	ConfigModel,
	InstructurModel,
	PackageModel,
	ArticelModel,
	GaleryModel
};
use Bcrypt\Bcrypt;

class AllSeeder extends Seeder
{

	public function run()
	{
		$bcrypt = new Bcrypt();

		// USER SEEDER
		$userModel = new UserModel();

		$userModel->insert([
			"username" => "admin",
			"email"	=> "admin@admin.com",
			"password" => $bcrypt->hash("12345678"),
			"phone"	=> "089999999999",
			"role"=> "admin"
		]);

		$userModel->insert([
			"username"	=> "user",
			"email"	=> "user@user.com",
			"password" => $bcrypt->hash("12345678"),
			"phone"	=> "08888888888"
		]);

		for($i=0;$i<100;$i++){
			$userModel->insert([
				"username"	=> "user".$i,
				"email" => "user".$i."@user.com",
				"password"	=> $bcrypt->hash("12345678"),
				"phone"	=> "089898989".$i
			]);
		}

		// CONFIG SEEDER
		$configModel = new ConfigModel();

		$configModel->insert([
			"name" => "site_name",
			"value" => "Kursus Mengemudi"
		]);

		$configModel->insert([
			"name" => "course_max_hour",
			"value" => 3
		]);

		$configModel->insert([
			"name" => "payment_day",
			"value" => 3
		]);
		
		// CONTACT SEEDER
		$contactModel = new ContactModel();

		for($i=0;$i<50;$i++){
			$contactModel->insert([
				"name" => "user".$i,
				"email" => "user@user".$i.".com",
				"phone"	=> "08999999".$i,
				"message" => "MESSAGE"
			]);
		}

		// INSTRUCTUR SEEDER
		$instructurModel = new InstructurModel();

		for($i=0;$i<10;$i++){
			$instructurModel->insert([
				"name" => "instructur".$i,
				"email" => "instructur@instructur".$i.".com",
				"phone" => "08999999".$i,				
			]);
		}

		// PACKAGE SEEDER
		$packageModel = new PackageModel();

		for($i=0;$i<5;$i++){
			$packageModel->insert([
				"name" => "package - ".$i,
				"meet" => rand(1,20),
				"cost"	=> rand(100000,500000)
			]);
		}

		// GALERY SEEDER
		$galeryModel = new GaleryModel();

		$galeryModel->insert([
			"title" => "galery 1",
			"images" => json_encode(["default.png","default-1.png","default-2.png"])
		]);

		$galeryModel->insert([
			"title" => "galery 2",
			"images" => json_encode(["default-3.png","default-4.png","default-5.png"])
		]);

		$galeryModel->insert([
			"title" => "galery 3",
			"images" => json_encode(["default-6.png"])
		]);

		// ARTICEL SEEDER
		$articelModel = new ArticelModel();

		for($i=0;$i<9;$i++){
			$articelModel->insert([				
				"title" => "articel ".$i,
				"image" => "default-".rand(1,6).".png",
				"content" => "<p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p><p>Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem Lorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLoremLorem Ipsum Lorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem IpsumLorem</p></p>"
			]);
		}
	}
}
