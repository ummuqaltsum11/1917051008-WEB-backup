<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Templating extends BaseController
{
    public function __construct() {
        $this->userModel = new UserModel();
    }

	public function index()
	{
        //echo "hello";
		//return view('v_posts');
        // echo view('v_posts');

        //echo view('layout/header', ['title' => "Blog - Posts"]);
        
        $data = [
            'title' => "Blog - Posts",
            //'nama' => "yuki"
        ];

        // echo view('layout/header', $data);
        // echo view('layout/navbar');
        // echo view('v_posts');
        // echo view('layout/footer');

        return view('view_admin', $data);
	}

    public function register()
	{

        $data = [
            'title' => "Register",
        ];

        return view('v_register', $data);
	}

    public function saveRegister()
	{
        $request = service('request');
        $data = [
            'fullname' => $request->getVar('fullname'),
            'email' => $request->getVar('email'),
            'password' => $request->getVar('password'),
        ];
        //dd($data);
        $this->userModel->insert($data);
        session()->setFlashdata('pesan', 'Registrasi Sukses');
        return redirect()->to('/home');
        // return redirect()->to('/register');
	}
}