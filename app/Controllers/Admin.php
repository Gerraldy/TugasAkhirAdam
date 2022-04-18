<?php
namespace App\Controllers;
use App\Models\LaporanPostModel;
use App\Models\LaporanAkunModel;
use App\Models\LaporanTokoModel;

class Admin extends BaseController
{
  protected $LaporanPostModel;
  protected $LaporanAkunModel;
  protected $LaporanTokoModel;

  public function __construct()
  {
    $this->LaporanPostModel = new LaporanPostModel();
    $this->LaporanAkunModel = new LaporanAkunModel();
    $this->LaporanTokoModel = new LaporanTokoModel();
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

	//--------------------------------------------------------------------

}
