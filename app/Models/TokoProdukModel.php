<?php

namespace App\Models;

use CodeIgniter\Model;



class TokoProdukModel extends Model
{
  protected $table = 'toko_produk';
  protected $primaryKey = "ID_Produk";
  protected $allowedFields = ['ID_Toko','ID_Kategori_Produk' ,'Nama_Produk','Deskripsi','LinkToped', 'LinkShopee', 'Url_Gambar'];


  public function ProdukToko()
  {
    $sql = "SELECT p.* FROM toko t, toko_produk p WHERE t.ID_Toko = p.ID_Toko";
    return $this->db->query($sql)->getResultArray();
  }

}
