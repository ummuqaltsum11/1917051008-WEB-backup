<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;

class AdminPostsController extends BaseController
{
	public function __construct(){
		$this->postModel = new PostModel();
	}

	public function index()
	{
		$PostModel = model("PostModel");
		$data = [
			'posts' => $PostModel->findAll()
		];
        return view("posts/index", $data);
	}

    public function create()
	{
        session();
		$data = [
			'validation' => \Config\Services::validation(),
		];
		return view("posts/create", $data);
		
	}

    public function store()
	{
        $valid = $this->validate([
			"judul" => [
				"label" => "Judul",
				"rules" => "required",
				"errors" => [
					"required" => "{field} Harus Diisi!",
				]
			],
			"slug" => [
				"label" => "Slug",
				"rules" => "required|is_unique[posts.slug]",
				"errors" => [
					"required" => "{field} Harus Diisi!",
					"is_unique" => "{field} sudah ada!",
				]
			],
			"kategori" => [
				"label" => "Kategori",
				"rules" => "required",
				"errors" => [
					"required" => "{field} Harus Diisi!",
				]
			],
			"author" => [
				"label" => "Author",
				"rules" => "required",
				"errors" => [
					"required" => "{field} Harus Diisi!",
				]
			],
			// "deskripsi" => [
			// 	"label" => "Deskripsi",
			// 	"rules" => "required",
			// 	"errors" => [
			// 		"required" => "{field} Harus Diisi!",
			// 	]
			// ]
		]);

		if ($valid) {
			$this->postModel->save([
				'judul' => $this->request->getVar('judul'),
				'slug' => $this->request->getVar("slug"),
				'kategori' => $this->request->getVar("kategori"),
				'author' => $this->request->getVar("author"),
				'deskripsi' => $this->request->getVar("deskripsi"),
			]);

			session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
			return redirect()->to(base_url('admin/posts'));

		} else {
			return redirect()->to(base_url('admin/posts/create'))->withInput()->with('validation', 
			$this->validator);
		}
	}

	public function edit($post_id){
		$data = [
			'title' => 'Form Edit Data',
			'validation' => \Config\Services::validation(),
			'post' => $this->postModel->getPosts($post_id)
		];
		return view("posts/edit", $data);
	}

	public function update($post_id){
		$valid = $this->validate([
			"judul" => [
				"label" => "Judul",
				"rules" => "required",
				"errors" => [
					"required" => "{field} Harus Diisi!",
				]
			],
			"kategori" => [
				"label" => "Kategori",
				"rules" => "required",
				"errors" => [
					"required" => "{field} Harus Diisi!",
				]
			],
			"author" => [
				"label" => "Author",
				"rules" => "required",
				"errors" => [
					"required" => "{field} Harus Diisi!",
				]
			],
			// "deskripsi" => [
			// 	"label" => "Deskripsi",
			// 	"rules" => "required",
			// 	"errors" => [
			// 		"required" => "{field} Harus Diisi!",
			// 	]
			// ]
		]);

		if ($valid) {
		$this->postModel->save([
			'post_id' => $post_id,
			'judul' => $this->request->getVar('judul'),
			'kategori' => $this->request->getVar("kategori"),
			'author' => $this->request->getVar("author"),
			'deskripsi' => $this->request->getVar("deskripsi")
		]);

		session()->setFlashdata('pesan', 'Data berhasil diubah');
		return redirect()->to(base_url('admin/posts'));
		
		}
		else {
			return 'Ada data yang belum terisi!!! Kolom (selain deskripsi) tidak boleh kosong !!';

		}
		// else {
		// 	return redirect()->to(base_url('admin/posts/edit'))->withInput()->with('validation', 
		// 	$this->validator);
		// }
	}


	public function delete($post_id) {
		$this->postModel->delete($post_id);
		session()->setFlashdata('pesan', 'Data berhasil dihapus');
		return redirect()->to(base_url('admin/posts'));
	}

	
}