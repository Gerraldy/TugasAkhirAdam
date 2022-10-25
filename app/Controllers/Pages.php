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
use App\Models\LaporanAkunModel;
use App\Models\LaporanTokoModel;


use App\Models\TMKModel;
use App\Models\BlockAkunModel;

use App\Models\TopikModel;
use App\Models\TopikKomentarModel;

use App\Models\FollowModel;

use App\Models\MemePolosModel;

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
	protected $LaporanAkunModel;
	protected $LaporanTokoModel;

	protected $TMKModel;
	protected $BlockAkunModel;

	protected $TopikModel;
	protected $TopiKomentarkModel;

	protected $FollowModel;

	protected $MemePolosModel;

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
		$this->LaporanAkunModel = new LaporanAkunModel();
		$this->LaporanTokoModel = new LaporanTokoModel();

		$this->TMKModel = new TMKModel();
		$this->BlockAkunModel = new BlockAkunModel();

		$this->TopikModel = new TopikModel();
		$this->TopikKomentarModel = new TopikKomentarModel();

		$this->FollowModel = new FollowModel();

		$this->MemePolosModel = new MemePolosModel();

	}

	public function index()
	{
	//	$posting = new PostModel();
		$session = session();
		$user = $session->get("user");
		$status = $session->get("status");
		//$post = $posting->findAll();
		$unlike = $this->UnlikeModel->findAll();
		$like = $this->LikeModel->findAll();
		$topik = $this->TopikModel->orderBy("ID_Topik", "DESC")->findAll();
		$tmk = $this->TMKModel->where('ID_Memers', $user)->findAll();
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
			'user' => $user,
			'status' => $status,
			'tmk' => $tmk,
			'topik' => $topik,
			'toko' => $this->TokoModel->where("ID_Memers", $user)->first(),
			'kategori' => $this->KategoriModel->namaKategori()
 		 ];
		   // dd($tmk);
		echo view('Pages/Home', $data);
	}

	public function Midtrans()
	{
		$data = [
			'title' => 'Pembayaran',
			'kategori' => $this->KategoriModel->namaKategori()
		];
		//dd($data['postinganKategori']);
		echo view('Midtrans/transaction', $data);
	}

	public function LanggananPro()
	{
		$iduser = session()->get("user");
		$data = [
			'title' => 'Pembayaran',
			'user' => $this->MemersModel->where("ID_Memers", $iduser)->first(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		//dd($data['user']);
		echo view('Pages/LanggananPro', $data);
	}

	public function getPostKategori($idKategoriPost)
	{
		// dd($idKategoriPost);
		$topik = $this->TopikModel->orderBy("ID_Topik", "DESC")->findAll();
		$data = [
			'title' => 'Apa nih?!',
			'topik' => $topik,
			'postinganKategori' => $this->PostModel->getPostKategori($idKategoriPost),
			'nama_kategori' => $this->PostModel->getNamaKategori($idKategoriPost),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		//dd($data['nama_kategori']);
		echo view('Pages/PostinganKategori', $data);
	}

	public function Cari()
	{
		$cari = $this->request->getGet('cari');
		$idkategoripost = $this->KategoriModel->select("ID_Kategori")->where("Nama_Kategori",$cari)->first();
		$data = [
			'title' => $cari,
			'postinganKategori' => $this->PostModel->getPostKategori($idkategoripost),
		  'nama_kategori' => $this->PostModel->getNamaKategori($idkategoripost['ID_Kategori']),
		  'kategori' => $this->KategoriModel->namaKategori()
		];
		//dd($idkategoripost['ID_Kategori']);
		echo view('Pages/PostinganKategori', $data);
	}

	public function FollowAkun()
	{
		$iduser = session()->get("user");
		$following = $this->request->getGet("idakun");
		$getuser = $this->MemersModel->where("ID_Memers", $following)->first();
		$follow = $this->FollowModel->where('Follower',$iduser)->orWhere('Following', $following)->first();
		$post = $this->request->getVar();
		$post['Follower'] = $iduser;
		$post['Following'] = $following;

		if ($follow != null) {
			$this->FollowModel->where('Follower',$iduser)->orWhere('Following', $following)->delete();
		}else {
			$this->FollowModel->save($post);
		}
		//dd($post);

		return redirect()->to(base_url('public/Pages/Profile?name='.$getuser['Nama']));
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

	public function TidakMasukAkal()
	{
		$iduser = session()->get("user");
		$slug = $this->request->getGet("slug");
		$postingan = $this->PostModel->where("slug", $slug)->first();

		$post['ID_Postingan'] = $postingan['ID_Postingan'];
		$post['ID_Memers'] = $iduser;

		$this->TMKModel->save($post);

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

  public function Topik()
  {
		$idtopik = $this->request->getGet("ID_Topik");
		$topik = $this->TopikModel->where("ID_Topik", $idtopik)->first();
		$komentar = $this->TopikKomentarModel->getKomentar($idtopik);
		$data = [
			'title' => $topik['Nama_Topik'],
			'topik' => $topik,
			'komentar' => $komentar,
			'kategori' => $this->KategoriModel->namaKategori()
		];
		// dd($komentar);
		echo view('Pages/Topik', $data);
  }

	public function BuatMeme()
  {
		$id = session()->get('user');
		if ($id != null) {
			$data = [
				'title' => "Buat Meme Mu Disini!",
				'user' => $this->MemersModel->where('ID_Memers',$id)->first(),
				'memepolos' => $this->MemePolosModel->findAll(),
				'kategori' => $this->KategoriModel->namaKategori()
			];
	    echo view('Pages/BuatMeme', $data);
		}else {
			$data = [
				'title' => "Login!",
				'kategori' => $this->KategoriModel->namaKategori()
			];
			$message = "Login Dulu Brooo!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			return view('Pages/Login', $data);
		}

  }
	public function MyProfile()
  {
		$id = session()->get('user');
		$user = $this->MemersModel->where('ID_Memers',$id)->first();
		$unlike = $this->UnlikeModel->findAll();
		$like = $this->LikeModel->findAll();
		$mypostingan = $this->PostModel->getMyPost($id);
		$postingan = $this->PostModel->getPostProfile($id);
		$savepost = $this->SavePostinganModel->getSavePost($id);
		$follower = count($this->FollowModel->Where('Following', $id)->findAll());
		$following = count($this->FollowModel->Where('Follower', $id)->findAll());
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
			'mypostingan' => $mypostingan,
			'follower' => $follower,
			'following' => $following,
			'postingan' => $postingan,
			'savepost' => $savepost,
			'kategori' => $this->KategoriModel->namaKategori()
		];

		 // dd($data['mypostingan']);
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
			$mypostingan = $this->PostModel->getMyPost($id);
			$user = $this->MemersModel->where('ID_Memers',$id)->first();
			$follower = count($this->FollowModel->Where('Following', $user)->findAll());
			$following = count($this->FollowModel->Where('Follower', $user)->findAll());
			$data = [
				'title' => "Profile!",
				'profile' => $user,
				'postingan' => $this->PostModel->getPostProfile($id),
				'follower' => $follower,
				'following' => $following,
				'savepost' => $savepost,
				'mypostingan' => $mypostingan,
				'kategori' => $this->KategoriModel->namaKategori()
			];
	    echo view('Pages/Profile', $data);
		}else {
			$userlain = $this->MemersModel->where('ID_Memers', $iduser)->first();
			$savepost = $this->SavePostinganModel->getSavePost($iduser);
			$mypostingan = $this->PostModel->getMyPost($iduser);
			$follow = $this->FollowModel->where('Follower',$user)->orWhere('Following', $iduser)->first();
			$follower = count($this->FollowModel->Where('Following', $iduser)->findAll());
			$following = count($this->FollowModel->Where('Follower', $iduser)->findAll());
			$data = [
				'title' => $namauser." - MemeTube",
				'kategori' => $this->KategoriModel->namaKategori(),
				'postingan' => $this->PostModel->getPostProfile($iduser),
				'follow' => $follow,
				'follower' => $follower,
				'following' => $following,
				'mypostingan' => $mypostingan,
				'savepost' => $savepost,
				'profile' => $userlain
			];
		 	//dd($following);
			echo view('Pages/ProfileUserLain', $data);
		}
	}

	public function LaporAkun()
	{
		$idakun = $this->request->getGet("idakun");

		$getuser = $this->MemersModel->where("ID_Memers", $idakun)->first();

		$data = [
			'title' => 'Laporan Akun!',
			'akun' => $getuser,
			'kategori' => $this->KategoriModel->namaKategori()
		];
		 //dd($getuser);
		echo view('Pages/LaporAkun', $data);
	}

	public function ReportAkun()
	{
		$iduser = session()->get("user");
		$idakun = $this->request->getGet("idakun");
		$getuser = $this->MemersModel->where("ID_Memers", $idakun)->first();
		$laporan = $this->request->getVar();
		$laporan['ID_Akun_Pelapor'] = $iduser;
		$laporan['ID_Pelanggar'] = $idakun;
		$this->LaporanAkunModel->save($laporan);
		//dd($laporan);
		return redirect()->to(base_url('public/Pages/Profile?name='.$getuser['Nama']));
	}

	public function BlockAkun()
	{
		$iduser = session()->get("user");
		$idakun = $this->request->getGet("idakun");
		$getuser = $this->MemersModel->where("ID_Memers", $idakun)->first();

		$blok['ID_Memers_Block'] = $idakun;
		$blok['ID_Memers'] = $iduser;
		//dd($blok);
		$this->BlockAkunModel->save($blok);
		return redirect()->to(base_url('public/Pages/Profile?name='.$getuser['Nama']));
	}

	public function SettingProfile()
	{
		$id = session()->get('user');
		$user = $this->MemersModel->where('ID_Memers',$id)->first();
		$data = [
			'title' => 'Profile',
			'user' => $user,
			'kategori' => $this->KategoriModel->namaKategori()
		];
		 //dd($data['user']);
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
		$id = session()->get('user');
		$user = $this->MemersModel->where('ID_Memers',$id)->first();
		$data = [
			'title' => 'Akun',
			'user' => $user,
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
		$id = session()->get('user');
		$user = $this->MemersModel->where('ID_Memers',$id)->first();
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
		$pesan = "Password Tidak Sama";

		if ($post['Password'] == $post['CPassword']) {
			$this->MemersModel->update($id_user, ['Password' => $post['Password']]);

			return redirect()->to(base_url('public/Pages/MyProfile'));
		} else {
			echo '<script type ="text/JavaScript">';
			echo 'alert("JavaScript Alert Box by PHP")';
			echo '</script>';

			return redirect()->to(base_url('public/Pages/SettingPassword'));
		}
		//dd($post);
	}

	public function Toko()
  {
		$user = session()->get("user");
		$data = [
			'title' => "Toko!",
			'toko' => $this->TokoModel->where("ID_Memers", $user)->first(),
			'toko_kategori' => $this->TokoKategoriModel->namaKategoriToko(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		// dd($data['toko_kategori']);
    echo view('Pages/Toko/Toko', $data);
  }

	public function TokoHome()
  {
		$user = session()->get("user");
		$data = [
			'title' => "Home!",
			'user' => $user,
			'toko' => $this->TokoModel->where("ID_Memers", $user)->first(),
			'toko_user' => $this->TokoModel->where("status", 1)->findAll(),
			'toko_kategori' => $this->TokoKategoriModel->namaKategoriToko(),
			'toko_produk' => $this->TokoProdukModel->findAll(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		 // dd($data['toko_produk']);
    echo view('Pages/Toko/TokoHome', $data);
  }

	public function BuatToko()
	{
		$user = session()->get("user");
		$data = [
			'title' => "Buka Toko!",
			'kategori' => $this->KategoriModel->namaKategori()
		];
		  echo view('Pages/Toko/BuatToko', $data);
	}

	public function CreateToko()
	{
		$user = session()->get("user");
		$post = $this->request->getVar();
		$post['status'] = 0;
		$post['ID_Memers'] = $user;
		$this->TokoModel->save($post);
		$data = [
			'title' => "Home!",
			'user' => $user,
			'toko' => $this->TokoModel->where("ID_Memers", $user)->first(),
			'toko_user' => $this->TokoModel->where("status", 1)->findAll(),
			'toko_kategori' => $this->TokoKategoriModel->namaKategoriToko(),
			'toko_produk' => $this->TokoProdukModel->findAll(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		 // dd($data['toko_produk']);
    echo view('Pages/Toko/TokoHome', $data);
	}

	public function UbahToko()
	{
		$user = session()->get("user");
		$idtoko = $this->request->getGet("idtoko");
		$data = [
			'title' => "Ubah Toko!",
			'toko' => $this->TokoModel->where("ID_Memers", $user)->first(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		  echo view('Pages/Toko/UbahToko', $data);
	}

	public function EditToko()
	{
		$id_user = session()->get("user");
		$idtoko = $this->request->getGet("idtoko");
		$post = $this->request->getVar();
		$this->TokoModel->update($idtoko, [
			'Nama_Toko' => $post['Nama_Toko'],
			'Kontak' => $post['Kontak'],
			'Tentang' => $post['Tentang'],
		]);
		$data = [
			'title' => "Toko!",
			'user' => $id_user,
			'toko' => $this->TokoModel->where("ID_Toko", $idtoko)->first(),
			'toko_produk' => $this->TokoProdukModel->where("ID_Toko", $idtoko)->findAll(),
			'toko_kategori' => $this->TokoKategoriModel->namaKategoriToko(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		// dd($data['toko']);
		echo view('Pages/Toko/TokoUser', $data);
	}

	public function TokoUser()
  {
		$id_user = session()->get("user");
		$idtoko = $this->request->getGet("idtoko");
		$data = [
			'title' => "Toko!",
			'user' => $id_user,
			'toko' => $this->TokoModel->where("ID_Toko", $idtoko)->first(),
			'toko_produk' => $this->TokoProdukModel->where("ID_Toko", $idtoko)->findAll(),
			'toko_kategori' => $this->TokoKategoriModel->namaKategoriToko(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		// dd($data['toko']);
    echo view('Pages/Toko/TokoUser', $data);
  }

	public function BukaTutupToko()
	{
		$status = $this->request->getGet("status");
		$idtoko = $this->request->getGet("idtoko");
		$id_user = session()->get("user");

		if ($status == 1) {
			$this->TokoModel->update($idtoko, ['status' => 0]);
		} elseif ($status == 0) {
			$this->TokoModel->update($idtoko, ['status' => 1]);
		}
		$data = [
			'title' => "Toko!",
			'user' => $id_user,
			'toko' => $this->TokoModel->where("ID_Toko", $idtoko)->first(),
			'toko_produk' => $this->TokoProdukModel->where("ID_Toko", $idtoko)->findAll(),
			'toko_kategori' => $this->TokoKategoriModel->namaKategoriToko(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		// dd($status);
		echo view('Pages/Toko/TokoUser', $data);
	}

	public function DetailProduk()
	{
		$id_user = session()->get("user");
		$idproduk = $this->request->getGet("idproduk");
		$idtoko = $this->request->getGet("idtoko");
		$data = [
			'title' => "Detail Produk!",
			'user' => $id_user,
			'toko' => $this->TokoModel->where("ID_Toko", $idtoko)->first(),
			'produk' => $this->TokoProdukModel->where("ID_Produk", $idproduk)->first(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		//dd($data['produk']);
		echo view('Pages/Toko/TokoDetailProduk', $data);
	}

	public function UbahProduk()
	{
		$id_user = session()->get("user");
		$idproduk = $this->request->getGet("idproduk");
		$data = [
			'title' => "Detail Produk!",
			'toko_kategori' => $this->TokoKategoriModel->namaKategoriToko(),
			'produk' => $this->TokoProdukModel->where("ID_Produk", $idproduk)->first(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		//dd($data['produk']);
		echo view('Pages/Toko/TokoEditProduk', $data);
	}

	public function EditProduk()
	{
		$idtoko = $this->request->getGet("idtoko");
		$idproduk = $this->request->getGet("idproduk");
		$id_user = session()->get("user");

		$file = $this->request->getFile('Url_Gambar');
		$fileName = $file->getRandomName();
		$file->move('uploads/gambar_produk/', $fileName);

		$post = $this->request->getVar();
		$post['Url_Gambar'] = $fileName;
		$post['ID_Toko'] = $idtoko;

		//dd($post);
		$this->TokoProdukModel->update($idproduk, [
			'ID_Toko' => $post['ID_Toko'],
			'Nama_Produk' => $post['Nama_Produk'],
			'Deskripsi' => $post['Deskripsi'],
			'ID_Kategori_Produk' => $post['ID_Kategori_Produk'],
			'Link_Toped' => $post['Link_Toped'],
			'Link_Shopee' => $post['Link_Shopee'],
			'Url_Gambar' => 	$post['Url_Gambar']
		]);

		$data = [
			'title' => "Detail Produk!",
			'produk' => $this->TokoProdukModel->where("ID_Produk", $idproduk)->first(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		//dd($data['produk']);
		echo view('Pages/Toko/TokoDetailProduk', $data);
	}

	public function HapusProduk()
	{
		$id_user = session()->get("user");
		$idproduk = $this->request->getGet("idproduk");
		$idtoko = $this->request->getGet("idtoko");
		$this->TokoProdukModel->where("ID_Produk", $idproduk)->delete();

		$data = [
			'title' => "Toko!",
			'user' => $id_user,
			'toko' => $this->TokoModel->where("ID_Toko", $idtoko)->first(),
			'toko_produk' => $this->TokoProdukModel->where("ID_Toko", $idtoko)->findAll(),
			'toko_kategori' => $this->TokoKategoriModel->namaKategoriToko(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		// dd($data['toko']);
    echo view('Pages/Toko/TokoUser', $data);
	}

	public function TambahProduk()
	{
		$id_user = session()->get("user");
		$data = [
			'title' => "Tambah Produk!",
			'toko' => $this->TokoModel->where("ID_Memers", $id_user)->first(),
			'toko_kategori' => $this->TokoKategoriModel->namaKategoriToko(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		echo view('Pages/Toko/TokoTambahProduk', $data);
	}

	public function InsertProduk()
	{
		$idtoko = $this->request->getGet("idtoko");
    $id_user = session()->get("user");
    $file = $this->request->getFile('Url_Gambar');
    $fileName = $file->getRandomName();
		$file->move('uploads/gambar_produk/', $fileName);
	  $post = $this->request->getVar();
		$post['Url_Gambar'] = $fileName;
		$post['ID_Toko'] = $idtoko;
		// dd($post);
		$this->TokoProdukModel->save($post);
		$data = [
			'title' => "Toko!",
			'user' => $id_user,
			'toko' => $this->TokoModel->where("ID_Toko", $idtoko)->first(),
			'toko_produk' => $this->TokoProdukModel->where("ID_Toko", $idtoko)->findAll(),
			'toko_kategori' => $this->TokoKategoriModel->namaKategoriToko(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		echo view('Pages/Toko/TokoUser', $data);
	}

	public function LaporToko()
	{
		$iduser = session()->get("user");
		$idtoko = $this->request->getGet("idtoko");
		$data = [
			'title' => "Tambah Produk!",
			'user' => $iduser,
			'toko' => $this->TokoModel->where("ID_Toko", $idtoko)->first(),
			'toko_kategori' => $this->TokoKategoriModel->namaKategoriToko(),
			'kategori' => $this->KategoriModel->namaKategori()
		];
		echo view('Pages/Toko/LaporToko', $data);
	}

	public function ReportToko()
	{
		$idtoko = $this->request->getGet("idtoko");
		$iduser = session()->get("user");
		$post = $this->request->getVar();
		$post['ID_Memers'] = $iduser;
		$post['ID_Toko'] = $idtoko;
		// dd($post);
		$this->LaporanTokoModel->save($post);
		return redirect()->to(base_url('public/Pages/TokoUser?idtoko='.$idtoko));
	}

	public function percobaan()
	{
		echo view('Pages/percobaan');
	}

	//--------------------------------------------------------------------

}
