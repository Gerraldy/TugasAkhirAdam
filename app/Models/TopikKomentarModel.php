<?php

namespace App\Models;

use CodeIgniter\Model;



class TopikKomentarModel extends Model
{
  protected $table = 'komentar_topik';
  protected $primaryKey = "ID_KomentarTopik";
  protected $allowedFields = ['ID_Topik	','ID_Memers', 'Isi_KomentarTopik'];

  public function getKomentar($idtopik)
  {
    $sql = "SELECT k.*, m.Nama, m.url_foto FROM komentar_topik k, memers m, topik t where k.ID_Memers = m.ID_Memers AND k.ID_Topik = t.ID_Topik AND k.ID_Topik =".$idtopik;
    return $this->db->query($sql)->getResultArray();
  }

}
