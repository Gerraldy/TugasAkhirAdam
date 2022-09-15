<?php

namespace App\Models;

use CodeIgniter\Model;



class LanggananProModel extends Model
{
  protected $table = 'transaksi_pro';
  protected $primaryKey = "ID_Transaksi";
  protected $useAutoIncrement = true;
  protected $allowedFields = ['ID_Memers','order_id', 'gross_amount', 'transaction_time'];

}
