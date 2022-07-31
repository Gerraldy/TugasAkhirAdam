<?php
namespace App\Controllers;
use App\Models\LaporanPostModel;
use App\Models\LaporanAkunModel;
use App\Models\LaporanTokoModel;
use App\Models\PostModel;
use App\Models\MemersModel;
use App\Models\TokoModel;
use App\Models\TopikModel;


class Admin extends BaseController
{
  protected $LaporanPostModel;
  protected $LaporanAkunModel;
  protected $LaporanTokoModel;
  protected $PostModel;
  protected $MemersModel;
  protected $TokoModel;
  protected $TopikModel;

  public function __construct()
  {
    $this->LaporanPostModel = new LaporanPostModel();
    $this->LaporanAkunModel = new LaporanAkunModel();
    $this->LaporanTokoModel = new LaporanTokoModel();
    $this->PostModel = new PostModel();
    $this->MemersModel = new MemersModel();
    $this->TokoModel = new TokoModel();
    $this->TopikModel = new TopikModel();
  }

  public function Dashboard()
	{
    echo view('Pages/Admin/AdminDashboard');
	}

  public function MasterTopik()
	{
    $data = [
      'topik' => $this->TopikModel->findAll()
    ];
    // dd($data['topik']);
    echo view('Pages/Admin/MasterTopik', $data);
	}

  public function MasterAddTopik()
  {
    echo view('Pages/Admin/MasterTopikAdd');
  }

  public function AddTopik()
  {

    $file = $this->request->getFile('Url_Foto');
    $fileName = $file->getRandomName();
    $file->move('uploads/gambar_topik/', $fileName);

    $post = $this->request->getVar();
    $post['Url_Foto'] = $fileName;
    $this->TopikModel->save($post);
   // dd($post);
    return redirect()->to(base_url('public/Admin/MasterTopik'));
  }

	public function TabelPost()
	{
    $data = [
      'laporanpost' => $this->LaporanPostModel->findAll()
    ];
    echo view('Pages/Admin/TLaporanPost', $data);
	}
  public function TabelAkun()
	{
    $data = [
      'laporanakun' => $this->LaporanAkunModel->findAll()
    ];
    echo view('Pages/Admin/TLaporanAkun', $data);
	}
  public function TabelToko()
	{
    $data = [
      'laporantoko' => $this->LaporanTokoModel->findAll()
    ];
    echo view('Pages/Admin/TLaporanToko', $data);
	}

  public function MasterMemers()
  {
    $data = [
      'mastermemers' => $this->MemersModel->findAll()
    ];
    //dd($data['mastermemers']);
    echo view('Pages/Admin/MasterMemers', $data);
  }

  public function MasterMemersPro()
  {
    $data = [
      'mastermemerspro' => $this->MemersModel->where('Status', 1)->findAll()
    ];

    // dd($data['mastermemerspro']);
    echo view('Pages/Admin/MasterMemersPro', $data);
  }

public function DetailLaporanPostingan()
{
  $idpost = $this->request->getGet("idpost");
  $detailpost = $this->PostModel->where("ID_Postingan", $idpost)->first();
  $data = [
    'title' => 'Detail Laporan!',
    'detailpost' => $detailpost
  ];
  //dd($detailpost);
  echo view('Pages/Admin/DetailLaporanPost', $data);
}

public function HapusPostingan()
{
  $idpost = $this->request->getGet("idpost");
  $this->PostModel->delete($idpost);
  $this->LaporanPostModel->where("ID_Postingan", $idpost)->delete();
  return redirect()->to(base_url('public/Admin/TabelPost'));
}

public function DetailLaporanAkun()
{
  $idakun = $this->request->getGet("idakun");
  $detailakun = $this->MemersModel->where("ID_Memers", $idakun)->first();
  //dd($detailakun);
  $data = [
    'title' => 'Detail Akun!',
    'detailakun' => $detailakun
  ];
  //dd($detailpost);
  echo view('Pages/Admin/DetailLaporanAkun', $data);
}

public function HapusAkun()
{
  $idakun = $this->request->getGet("idakun");
  $this->MemersModel->delete($idakun);
  $this->LaporanAkunModel->where("ID_Memers", $idakun)->delete();
  return redirect()->to(base_url('public/Admin/TabelAkun'));
}

public function DetailLaporanToko()
{
  $idtoko = $this->request->getGet("idtoko");
  $detailtoko = $this->TokoModel->where("ID_Toko", $idtoko)->first();
  //dd($detailtoko);
  $data = [
    'title' => 'Detail Toko!',
    'detailtoko' => $detailtoko
  ];
  //dd($detailpost);
  echo view('Pages/Admin/DetailLaporanToko', $data);
}

public function HapusToko()
{
  $idtoko = $this->request->getGet("idtoko");
  $this->TokoModel->delete($idtoko);
  $this->LaporanTokoModel->where("ID_Toko", $idtoko)->delete();
  return redirect()->to(base_url('public/Admin/TabelToko'));
}

	//--------------------------------------------------------------------

}
