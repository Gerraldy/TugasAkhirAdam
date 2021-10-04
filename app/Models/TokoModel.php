<?php

namespace App\Models;

use CodeIgniter\Model;



class TokoModel extends Model
{
  protected $table = 'toko';
  protected $primaryKey = "ID_Toko";
  protected $allowedFields = ['ID_Memers','Nama_Toko', 'Kontak'];

}
