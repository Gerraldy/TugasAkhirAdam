<?php

namespace App\Models;

use CodeIgniter\Model;



class LikeModel extends Model
{
  protected $table = 'suka';
  protected $primaryKey = "ID_Suka";
  protected $allowedFields = ['ID_Suka','ID_Postingan', 'ID_Memers'];

}
