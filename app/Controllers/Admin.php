<?php
namespace App\Controllers;
use App\Models\LaporanPostModel;

class Admin extends BaseController
{
  protected $LaporanPostModel;

  public function __construct()
  {
    $this->LaporanPostModel = new LaporanPostModel();
  }

  public function Dashboard()
	{
    echo view('Pages/Admin/AdminDashboard');
	}

	public function TabelAkun()
	{
    $data = [
      'laporanpost' => $this->LaporanPostModel->findAll()
    ];
    echo view('Pages/Admin/TLaporanAkun', $data);
	}

	//--------------------------------------------------------------------

}
