<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AdminUsers extends BaseController
{
	protected $userModel;
	public function __construct(){
		$this->userModel = new UserModel();
	}

	public function index()
	{
		$UserModel = model("UserModel");
		$data2 = [
			'users' => $UserModel->findAll()
		];
        return view("users/index", $data2);
	}

    public function create()
	{
        session();
		$data2 = [
			'validation' => \Config\Services::validation(),
		];
		return view("users/create", $data2);
		
	}

    public function save()
	{
        $valid = $this->validate([
			"fullname" => [
				"label" => "Fullname",
				"rules" => "required",
				"errors" => [
					"required" => "{field} Harus Diisi!",
				]
			],
			"biodata" => [
				"label" => "Biodata",
				"rules" => "required",
				"errors" => [
					"required" => "{field} Harus Diisi!",
				]
			],
			"email" => [
				"label" => "Email",
				"rules" => "required|is_unique[users.email]",
				"errors" => [
					"required" => "{field} Harus Diisi!",
                    "is_unique" => "{field} sudah ada!",
				]
			],
			"password" => [
				"label" => "Password",
				"rules" => "required",
				"errors" => [
					"required" => "{field} Harus Diisi!",
				]
			]
			// "foto" => [
			// 	"label" => "Foto Profil",
			// 	"rules" => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
			// 	"errors" => [
            //         'uploaded' => "{field} Harus Diisi!",
            //         'max_size' => "Ukuran gambar terlalu besar",
            //         'is_image' => "Yang Anda pilih bukan gambar",
            //         'mime_in'  => "Yang anda pilih bukan gambar"
			// 	]
			// ]
		]);

		if ($valid) {
			$this->userModel->save([
				'fullname' => $this->request->getVar('fullname'),
				'biodata' => $this->request->getVar("biodata"),
				'email' => $this->request->getVar("email"),
				'password' => $this->request->getVar("password"),
				'foto' => $this->request->getVar("foto"),
			]);

			// dd('berhasil');
			session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
			return redirect()->to(base_url('admin/users'));
		} else {
			return redirect()->to(base_url('admin/users/create'))->withInput()->with('validation', 
			$this->validator);
		}
	}

    public function delete($id) {
		$this->userModel->delete($id);
		session()->setFlashdata('pesan', 'Data berhasil dihapus');
		return redirect()->to(base_url('admin/users'));
	}

	public function edit($id) {
		$data2 = [
			'title' => 'Form Edit Data',
			'validation' => \Config\Services::validation(),
			'user' => $this->userModel->getUsers($id)
		];
		return view("users/edit", $data2);
	}

	public function ubah($id) {
		// dd($this->request->getVar());

		$valid = $this->validate([
			"fullname" => [
				"label" => "Fullname",
				"rules" => "required",
				"errors" => [
					"required" => "{field} Harus Diisi!",
				]
			],
			"biodata" => [
				"label" => "Biodata",
				"rules" => "required",
				"errors" => [
					"required" => "{field} Harus Diisi!",
				]
			],
			"password" => [
				"label" => "Password",
				"rules" => "required",
				"errors" => [
					"required" => "{field} Harus Diisi!",
				]
			]
		]);

		if ($valid) {
			$this->userModel->save([
				'id' => $id,
				'fullname' => $this->request->getVar('fullname'),
				'biodata' => $this->request->getVar("biodata"),
				'password' => $this->request->getVar("password"),
				'foto' => $this->request->getVar("foto"),
			]);

			// dd('berhasil');
			session()->setFlashdata('pesan', 'Data berhasil diubah');
			return redirect()->to(base_url('admin/users'));
		}
		else {
			return 'Ada data yang belum terisi!!!';
			
		}
		// else {
		// 	$validation = \Config\Services::validation();
		// 	return redirect()->to(base_url('admin/users/edit'))->withInput()->with('validation',$validation);
		// }
	}
}