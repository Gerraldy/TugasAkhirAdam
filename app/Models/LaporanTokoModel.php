<?php

namespace App\Models;

use CodeIgniter\Model;



class LaporanTokoModel extends Model
{
  protected $table = 'laporan_toko';
  protected $primaryKey = "ID_Laporan_Toko";
  protected $useAutoIncrement = true;
  protected $allowedFields = ['ID_Laporan_Toko','ID_Memers', 'ID_Toko', 'Alasan'];

}
