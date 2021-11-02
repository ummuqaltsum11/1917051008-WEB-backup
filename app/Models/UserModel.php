<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table                = 'users';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['fullname', 'email', 'password', 'foto', 'biodata'];
	protected $useTimestamps        = true;

	public function getUsers($id = false){
		if($id == false) {
			return $this->findAll();
		}
		return $this->where(['id' => $id])->first();
	}
}