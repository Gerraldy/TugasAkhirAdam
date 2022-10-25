<?php

namespace App\Models;

use CodeIgniter\Model;



class MemersBanModel extends Model
{
  protected $table = 'memers_ban';
  protected $primaryKey = "ID_Memers_Ban";
  protected $allowedFields = ['ID_Memers', 'Email'];

}
