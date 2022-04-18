<?php

namespace App\Models;

use CodeIgniter\Model;



class LaporanAkunModel extends Model
{
  protected $table = 'laporan_akun';
  protected $primaryKey = "ID_Laporan_Akun";
  protected $useAutoIncrement = true;
  protected $allowedFields = ['ID_Laporan_Akun','ID_Akun_Pelapor', 'ID_Pelanggar', 'Alasan'];

}
