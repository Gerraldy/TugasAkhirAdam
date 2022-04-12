<?php

namespace App\Models;

use CodeIgniter\Model;



class LaporanPostModel extends Model
{
  protected $table = 'laporan_post';
  protected $primaryKey = "ID_Laporan_Post";
  protected $useAutoIncrement = true;
  protected $allowedFields = ['ID_Laporan_Post','ID_Postingan', 'ID_Memers', 'Alasan'];

}
