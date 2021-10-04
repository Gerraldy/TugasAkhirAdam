<?php

namespace App\Models;

use CodeIgniter\Model;

class UnlikeModel extends Model
{
  protected $table = 'tidak_suka';
  protected $primaryKey = "ID_Tidak_Suka";
  protected $allowedFields = ['ID_Tidak_Suka','ID_Postingan', 'ID_Memers'];
}
