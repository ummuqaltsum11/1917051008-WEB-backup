<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PostController extends BaseController
{
	public function index()
	{
        //echo "hello";
		//return view('v_posts');
        // echo view('v_posts');

        //echo view('layout/header', ['title' => "Blog - Posts"]);
        
        $data = [
            'title' => "Blog - Posts",
            'nama' => "yuki"
        ];
        echo view('layout/header', $data);
        echo view('layout/navbar');
        echo view('v_posts');
        echo view('layout/footer');
	}
}