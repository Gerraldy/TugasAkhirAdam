<?php
namespace App\Controllers;
use App\Models\LaporanPostModel;
use App\Models\LaporanAkunModel;
use App\Models\LaporanTokoModel;
use App\Models\PostModel;
use App\Models\MemersModel;
use App\Models\TokoModel;

;

class Admin extends BaseController
{
  protected $LaporanPostModel;
  protected $LaporanAkunModel;
  protected $LaporanTokoModel;
  protected $PostModel;
  protected $MemersModel;
  protected $TokoModel;

  public function __construct()
  {
    $this->LaporanPostModel = new LaporanPostModel();
    $this->LaporanAkunModel = new LaporanAkunModel();
    $this->LaporanTokoModel = new LaporanTokoModel();
    $this->PostModel = new PostModel();
    $this->MemersModel = new MemersModel();
    $this->TokoModel = new TokoModel();
  }

  public function Dashboard()
	{
    echo view('Pages/Admin/AdminDashboard');
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
  $this->LaporanPostModel->delete($idpost);
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
  $this->LaporanAkunModel->delete($idakun);
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

	//--------------------------------------------------------------------

}
