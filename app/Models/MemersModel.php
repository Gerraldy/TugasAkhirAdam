<?php
namespace App\Models;
use CodeIgniter\Model;
class MemersModel extends Model
{
  protected $table = 'memers';
  protected $primaryKey = 'ID_Memers';
  protected $useAutoIncrement = true;
  protected $allowedFields = ['Email','Username', 'Nama','Password', 'Tgl_Lahir','Status', 'url_foto', 'Tentang', 'JKelamin'];
}
?>
