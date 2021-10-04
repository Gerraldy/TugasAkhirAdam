<?php

namespace App\Models;

use CodeIgniter\Model;



class TokoKategoriModel extends Model
{
  protected $table = 'toko_kategori';
  protected $primaryKey = 'ID_Kategori_Produk';

  public function namaKategoriToko()
  {
    return $this->findAll();
  }
}
