<?php

namespace App\Models;

use CodeIgniter\Model;



class MemePolosModel extends Model
{
  protected $table = 'meme_polos';
  protected $primaryKey = "ID_Meme";
  protected $allowedFields = ['Gambar_Meme'];

}
