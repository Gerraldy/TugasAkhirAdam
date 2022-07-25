<?php

namespace App\Models;

use CodeIgniter\Model;



class TopikModel extends Model
{
  protected $table = 'topik';
  protected $primaryKey = "ID_Topik";
  protected $allowedFields = ['Nama_Topik','Judul_Topik', 'Url_Foto'];

}
