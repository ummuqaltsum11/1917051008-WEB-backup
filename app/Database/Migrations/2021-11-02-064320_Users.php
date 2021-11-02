<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
				'id' => [
					'type' => 'INT',
					'constraint'     => 10,
					'unsigned'       => true,
					'auto_increment' => true,
				],
				'fullname' => [
					'type' => 'VARCHAR',
					'constraint' => 100,
				],
				'biodata' => [
					'type' => 'VARCHAR',
					'constraint' => 100,
				],
				'email' => [
					'type' => 'VARCHAR',
					'constraint' => 100,
				],
				'password' => [
					'type' => 'VARCHAR',
					'constraint' => 100,
				],
				'foto' => [
					'type' => 'VARCHAR',
					'constraint' => 100,
					'null' => true
				],
				'created_at' => [
					'type' => 'DATETIME',
					'null' => true,
				],
				'updated_at' => [
					'type' => 'DATETIME',
					'null' => true,
				]
			]);

			$this->forge->addKey('id', true);
			$this->forge->createTable('users');
	}

	public function down()
	{
			$this->forge->dropTable('users');
	}
}