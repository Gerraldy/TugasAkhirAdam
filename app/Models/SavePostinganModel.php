<?php

namespace App\Models;

use CodeIgniter\Model;



class SavePostinganModel extends Model
{
  protected $table = 'save_post';
  //protected $primaryKey = "ID_Suka";
  protected $allowedFields = ['Tgl_Save','ID_Postingan', 'ID_Memers'];

  public function getSavePost($id)
  {
    $sql = "SELECT p.*, k.Nama_Kategori from postingan p, kategori k, save_post s, memers m where p.ID_Kategori = k.ID_Kategori AND p.ID_Postingan = s.ID_Postingan AND s.ID_Memers = m.ID_Memers AND s.ID_Memers =".$id." ORDER BY s.Tgl_Save DESC";
    return $this->db->query($sql)->getResultArray();
  }

}
