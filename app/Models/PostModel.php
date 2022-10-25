<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'postingan';
    protected $primaryKey = 'ID_Postingan';
    protected $allowedFields = ['Suka', 'Tidak_Suka'];

    public function getPost($slug = false)
    {
      if ($slug == false){
        return $this->findAll();
      }
      return $this->where(['slug' => $slug])->first();
    }
    public function getPostKategori($idKategoriPost)
    {
      if ($idKategoriPost == false) {
        return $this->findAll();
      }
        // return $this->findAll();
        // return $idKategoriPost;
      return $this->where(['ID_Kategori' => $idKategoriPost])->orderBy('Tgl_Upload', 'DESC')->findAll();
    }

    public function getPostProfile($id)
    {
      $sql = "SELECT p.*, k.Nama_Kategori FROM postingan p, suka s, memers m, kategori k WHERE p.ID_Kategori = k.ID_Kategori AND p.ID_Postingan = s.ID_Postingan AND s.ID_Memers = m.ID_Memers AND m.ID_Memers =".$id." ORDER BY s.Tgl_Suka DESC";

      return $this->db->query($sql)->getResultArray();
    }

    public function getMyPost($id)
    {
      $sql = "SELECT p.*, k.Nama_Kategori FROM postingan p,kategori k, memers m WHERE p.ID_Kategori = k.ID_Kategori AND p.ID_Memers = m.ID_Memers AND m.ID_Memers = ".$id." ORDER BY p.Tgl_Upload DESC";

      return $this->db->query($sql)->getResultArray();
    }

    public function getNamaKategori($idkategoriPost)
    {
      $sql="select k.Nama_Kategori from kategori k, postingan p where p.ID_Kategori = k.ID_Kategori AND p.ID_kategori =".$idkategoriPost;
      // log_message('error', $sql);
      // dd($sql);
      return $this->db->query($sql)->getRowArray();
    }

    public function getPostAndDetail()
    {
      $session = session();
      $id_user = $session->get('user');
      // $sql= "SELECT p.*,k.Nama_Kategori, CASE WHEN p.ID_Postingan = t.ID_Postingan AND t.ID_Memers = 50 THEN '1' ELSE '0' END as 'Dislike' from postingan p, Tidak_Suka t, kategori k WHERE p.ID_Kategori = k.ID_Kategori ORDER BY Tgl_Upload";
      $sql = "SELECT p.*,k.Nama_Kategori, m.Nama from postingan p, kategori k, memers m WHERE p.ID_Memers = m.ID_Memers AND p.ID_Kategori = k.ID_Kategori ORDER BY Tgl_Upload DESC";
        return $this->db->query($sql)->getResultArray();
    }
    public function getKategori($idkategori)
    {
      $sql="select k.Nama_Kategori from kategori k, postingan p where p.ID_Kategori = k.ID_Kategori AND p.ID_kategori =".$idkategori;
      // log_message('error', $sql);
      // dd($sql);
      return $this->db->query($sql)->getRowArray();
    }

}
