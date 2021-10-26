<?php

namespace App\Models;

use CodeIgniter\Model;



class SavePostinganModel extends Model
{
  protected $table = 'save_post';
  //protected $primaryKey = "ID_Suka";
  protected $allowedFields = ['Tgl_Save','ID_Postingan', 'ID_Memers'];

}
