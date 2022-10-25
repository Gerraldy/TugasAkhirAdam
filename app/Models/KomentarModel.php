<?php

namespace App\Models;

use CodeIgniter\Model;



class KomentarModel extends Model
{
  protected $table = 'komentar';
  protected $primaryKey = "ID_Komentar";
  protected $allowedFields = ['ID_Komentar','ID_Postingan','ID_Memers','Isi_Komentar'];


  public function getKomentar($idpostingan)
  {
    $sql = "SELECT k.*, m.Nama, m.Url_Foto FROM komentar k, memers m, postingan p WHERE k.ID_Memers = m.ID_Memers AND p.ID_Postingan = k.ID_Postingan AND k.ID_Postingan =".$idpostingan;
    return $this->db->query($sql)->getResultArray();
    // SELECT k.*, m.Nama, m.Url_Foto FROM komentar k, memers m, postingan p WHERE k.ID_Postingan = p.ID_Postingan AND k.ID_Memers = m.ID_Memers
  }
}
