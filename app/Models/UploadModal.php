<?php

namespace App\Models;

use CodeIgniter\Model;



class UploadModal extends Model
{
  protected $table = 'postingan';
  protected $primaryKey = 'ID_Postingan';
  protected $useAutoIncrement = true;
  protected $allowedFields =['ID_Memers', 'Username', 'Slug','ID_Kategori', 'Judul', 'Nama_Gambar', 'Suka', 'Tidak_Suka', 'NSFW'];
}
