<?php

namespace App\Models;

use CodeIgniter\Model;



class TMKModel extends Model
{
  protected $table = 'tidak_masuk_akal';
  protected $primaryKey = "ID_TMK";
  protected $allowedFields = ['ID_Postingan','ID_Memers'];

}
