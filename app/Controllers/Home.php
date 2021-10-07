<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		//return getenv('Nama');
		//$data = Contact::getContact();
		return view('welcome_message');
	}

	// public function getContact() {
	// 	return "Yuki";
	// }


	public function show() {
		$adat['nama'] = 'Ummu';
		$adat['jurusan'] = 'Ilmu Komputer';
		echo view("mahasiswa/index", $adat);
		echo view("mahasiswa/header");
		echo view("mahasiswa/footer");
	}
}
