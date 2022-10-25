<?php

namespace App\Models;

use CodeIgniter\Model;



class BlockAkunModel extends Model
{
  protected $table = 'memers_block';
  protected $primaryKey = "ID_Block";
  protected $allowedFields = ['ID_Memers_Block','ID_Memers'];

}
