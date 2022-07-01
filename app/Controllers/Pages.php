<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\MemersModel;
use App\Models\KategoriModel;
use CodeIgniter\Model;

use App\Models\UnlikeModel;
use App\Models\LikeModel;
use App\Models\KomentarModel;
use App\Models\SavePostinganModel;

use App\Models\TokoModel;
use App\Models\TokoKategoriModel;
use App\Models\TokoProdukModel;

use App\Models\LaporanPostModel;

class Pages extends BaseController
{
	protected $PostModel;
	protected $MemersModel;
	protected $KategoriModel;

	protected $UnlikeModel;
	protected $LikeModel;
	protected $KomentarModel;
	protected $SavePostinganModel;

	protected $TokoModel;
	protected $TokoKategoriModel;
	protected $TokoProdukModel;

	protected $LaporanPostModel;

	public function __construct()
	{
		$this->PostModel = new PostModel();
		$this->MemersModel = new MemersModel();
		$this->KategoriModel = new KategoriModel();

		$this->UnlikeModel = new UnlikeModel();
		$this->LikeModel = new LikeModel();
		$this->KomentarModel = new KomentarModel();
		$this->SavePostinganModel = new SavePostinganModel();

		$this->TokoModel = new TokoModel();
		$this->TokoKategoriModel = new TokoKategoriModel();
		$this->TokoProdukModel = new TokoProdukModel();

		$this->LaporanPostModel = new LaporanPostModel();

	}

	public function index()
	{
	//	$posting = new PostModel();
		$session = session();
		$user = $session->get("user");

		//$post = $posting->findAll();
		$unlike = $this->UnlikeModel->findAll();
		$like = $this->LikeModel->findAll();
		$postingan = $this->PostModel->getPostAndDetail();
		// dd($unlike);
		for ($i=0; $i < count($postingan); $i++) {
			// echo "a";
			foreach ($unlike as $key) {
				if ($postingan[$i]["ID_Postingan"] == $key["ID_Postingan"] && $user == $key["ID_Memers"]) {
					$postingan[$i]["Dislike"] = "1";
				}
			}
			foreach ($like as $key) {
				if ($postingan[$i]["ID_Postingan"] == $key["ID_Postingan"] && $user == $key["ID_Memers"]) {
					$postingan[$i]["Like"] = "1";
				}
			}
		}

		 //dd($postingan);
		$data = [
      'title' => 'Home!',
      'postingan' => $postingan,
			'kategori' => $this->KategoriModel->namaKategori()
 		 ];
		 // dd($data['postingan']);
		echo view('Pages/Home', $data);
	}
	public function getPostKategori($idKategoriPost)
	{
		// dd($idKategoriPost);
		$data = [
			'title' => 'Apa nih?!',
			'postinganKategori' => $this->PostModel->getPostKategori($idKategoriPost),
			'nama_kategori' => $this->PostModel->getNamaKategori($idKategoriPost),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		//dd($data['postinganKategori']);
		echo view('Pages/PostinganKategori', $data);
	}

	public function Cari()
	{
		$cari = $this->request->getGet('cari');
		$idkategori = $this->KategoriModel->select("ID_Kategori")->where("Nama_Kategori",$cari)->first();
		$data = [
			'title' => $cari,
			'postinganKategori' => $this->PostModel->getPostKategori($idkategori),
		  //'nama_kategori' => $this->PostModel->getNamaKategori($idkategori),
		  'kategori' => $this->KategoriModel->namaKategori()
		];
	//	dd($data['postinganKategori']);
		echo view('Pages/PostinganKategori', $data);
	}

	public function Komentar()
	{
		$slug = $this->request->getGet("slug");

		$postingan = $this->PostModel->where("slug",$slug)->first();
		$idkategori = $postingan["ID_Kategori"];
		$idpostingan = $postingan["ID_Postingan"];
		// dd($postingan);
		$data = [
			'title' => $slug,
			'namaKategori' => $this->PostModel->getKategori($idkategori),
			'slug' => $this->PostModel->getPost($slug),
			'kategori' => $this->KategoriModel->namaKategori(),
			'komen' => $this->KomentarModel->getKomentar($idpostingan)
		];
		 // dd($data["slug"]);
		echo view('Pages/Komentar', $data);
	}

	public function SavePost()
	{
		$iduser = session()->get("user");
		$slug = $this->request->getGet("slug");
		$postingan = $this->PostModel->where("slug", $slug)->first();

		$post['ID_Postingan'] = $postingan['ID_Postingan'];
		$post['ID_Memers'] = $iduser;

		$this->SavePostinganModel->save($post);
		//dd($post);
		return redirect()->to(base_url('public/'));
	}

	public function LaporPost()
	{
		$slug = $this->request->getGet("slug");
		$postingan = $this->PostModel->where("slug", $slug)->first();
		//dd($postingan);
		$data =[
			'postingan' => $postingan,
			'title' => 'REPORT!',
			'kategori' => $this->KategoriModel->namaKategori()
		];
		echo view('Pages/LaporPost', $data);
	}
	public function LaporanPostingan()
	{
		$iduser = session()->get("user");
		$slug = $this->request->getGet("slug");

		$postingan = $this->PostModel->where("slug", $slug)->first();
		$alasan = $this->request->getPost();

		$post['ID_Postingan'] = $postingan['ID_Postingan'];
		$post['ID_Memers'] = $iduser;
		$post['Alasan'] = $alasan;
		//dd($postingan);
		$this->LaporanPostModel->save($post);
		return redirect()->to(base_url('public/'));
	}

	public function PostKategori()
	{
		$data = [
			'title' => 'kategori~',
			'kategori' => $this->PostModel->getPost()
		];
		// dd($data['kategori']);
		echo view('Pages/Kategori', $data);
	}
	public function Login()
	{
    $data = [
			'title' => "Login!",
			'kategori' => $this->KategoriModel->namaKategori()
		];
    return view('Pages/Login', $data);
	}
  public function Topic1()
  {
		$data = [
			'title' => "Covid19!",
			'kategori' => $this->KategoriModel->namaKategori()
		];
    echo view('Pages/Topik1', $data);
  }

	public function Topic2()
  {
		$data = [
			'title' => "Pemerintah!",
			'kategori' => $this->KategoriModel->namaKategori()
		];
    echo view('Pages/Topik2', $data);
  }

	public function Topic3()
  {
		$data = [
			'title' => "Vaksin!",
			'kategori' => $this->KategoriModel->namaKategori()
		];
    echo view('Pages/Topik3', $data);
  }

	public function Topic4()
  {
		$data = [
			'title' => "Cafe!",
			'kategori' => $this->KategoriModel->namaKategori()
		];
    echo view('Pages/Topik4', $data);
  }

	public function BuatMeme()
  {
		$data = [
			'title' => "Buat Meme Mu Disini!",
			'kategori' => $this->KategoriModel->namaKategori()
		];
    echo view('Pages/BuatMeme', $data);
  }
	public function MyProfile()
  {
		$id = session()->get('user');
		$user = $this->MemersModel->where('ID_Memers',$id)->first();
		$unlike = $this->UnlikeModel->findAll();
		$like = $this->LikeModel->findAll();
		$postingan = $this->PostModel->getPostProfile($id);
		$savepost = $this->SavePostinganModel->getSavePost($id);
		for ($i=0; $i < count($postingan); $i++) {
			// echo "a";
			foreach ($unlike as $key) {
				if ($postingan[$i]["ID_Postingan"] == $key["ID_Postingan"] && $user == $key["ID_Memers"]) {
					$postingan[$i]["Dislike"] = "1";
				}
			}
			foreach ($like as $key) {
				if ($postingan[$i]["ID_Postingan"] == $key["ID_Postingan"] && $user == $key["ID_Memers"]) {
					$postingan[$i]["Like"] = "1";
				}
			}
		}
		$data = [
			'title' => "Profile!",
			'profile' => $user,
			'postingan' => $postingan,
			'savepost' => $savepost,
			'kategori' => $this->KategoriModel->namaKategori()
		];

	//	 dd($data['savepost']);
    echo view('Pages/Profile', $data);
  }
	public function Profile()
	{
		$namauser = $this->request->getGet("name");
		$getuser = $this->MemersModel->where("Nama", $namauser)->first();
		$iduser = $getuser['ID_Memers'];
		$user = session()->get("user");
		$savepost = $this->SavePostinganModel->getSavePost($iduser);
		if ($iduser == $user) {
			$id = session()->get('user');
			$user = $this->MemersModel->where('ID_Memers',$id)->first();
			$data = [
				'title' => "Profile!",
				'profile' => $user,
				'postingan' => $this->PostModel->getPostProfile($id),
				'savepost' => $savepost,
				'kategori' => $this->KategoriModel->namaKategori()
			];
	    echo view('Pages/Profile', $data);
		}else {
			$userlain = $this->MemersModel->where('ID_Memers', $iduser)->first();
			$savepost = $this->SavePostinganModel->getSavePost($iduser);
			$data = [
				'title' => $namauser." - MemeTube",
				'kategori' => $this->KategoriModel->namaKategori(),
				'postingan' => $this->PostModel->getPostProfile($iduser),
				'savepost' => $savepost,
				'profile' => $userlain
			];
		// dd($userlain);
			echo view('Pages/ProfileUserLain', $data);
		}
	}



	public function SettingProfile()
	{
		$data = [
			'title' => 'Profile',
			'kategori' => $this->KategoriModel->namaKategori()
		];
		 // dd($data['kategori']);
		echo view('Pages/Setting/Profile', $data);
	}
	public function UpdateProfile()
	{
		$session = session();
		$id_user = $session->get("user");
		$file = $this->request->getFile('url_foto');
		$fileName = $file->getRandomName();
		$file->move('uploads/gambar_profile/', $fileName);
		$post = $this->request->getVar();

		$this->MemersModel->update($id_user, [
			'Nama' => $post['Nama'],
			'Tgl_Lahir' => $post['Tgl_Lahir'],
			'Tentang' => $post['Tentang'],
			'url_foto' => $fileName
		]);
		// dd($data);
		return redirect()->to(base_url('public/Pages/SettingProfile'));
	}

	public function SettingAkun()
	{
		$data = [
			'title' => 'Akun',
			'kategori' => $this->KategoriModel->namaKategori()
		];
		 // dd($data['kategori']);
		echo view('Pages/Setting/Akun', $data);
	}

	public function UpdateAkun()
	{
		$session = session();
		$id_user = $session->get("user");

		$post = $this->request->getVar();
		$this->MemersModel->update($id_user, [
			'Username' => $post['Username'],
			'Email' => $post['Email']
		]);
		//dd($post);
		return redirect()->to(base_url('public/Pages/SettingAkun'));

	}

	public function SettingPassword()
	{
		$data = [
			'title' => 'Password',
			'kategori' => $this->KategoriModel->namaKategori()
		];
		 // dd($data['kategori']);
		echo view('Pages/Setting/Password', $data);
	}
	public function UpdatePassword()
	{
		$session = session();
		$id_user = $session->get("user");

		$post = $this->request->getVar();
		$this->MemersModel->update($id_user, ['Password' => $post['Password']
		]);
		//dd($post);
		return redirect()->to(base_url('public/Pages/SettingAkun'));

	}


	public function Toko()
  {
		$data = [
			'title' => "Toko!",
			'toko_kategori' => $this->TokoKategoriModel->namaKategoriToko(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		// dd($data['toko_kategori']);
    echo view('Pages/Toko', $data);
  }

	public function TokoHome()
  {
		$data = [
			'title' => "Home!",
			'toko_user' => $this->TokoModel->findAll(),
			'toko_kategori' => $this->TokoKategoriModel->namaKategoriToko(),
			'toko_produk' => $this->TokoProdukModel->ProdukToko(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		 // dd($data['toko_produk']);
    echo view('Pages/TokoHome', $data);
  }

	public function TokoUser()
  {
		$data = [
			'title' => "Tokoku!",
			'toko_kategori' => $this->TokoKategoriModel->namaKategoriToko(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		// dd($data['toko_kategori']);
    echo view('Pages/TokoUser', $data);
  }

	public function percobaan()
	{
		echo view('Pages/percobaan');
	}

	//--------------------------------------------------------------------

}
