<?php

namespace App\Controllers;

use App\Models\LikeModel;
use App\Models\UnlikeModel;
use App\Models\PostModel;
use App\Models\KomentarModel;
use App\Models\TopikKomentarModel;

class LikeKomen extends BaseController
{
  protected $LikeModel;
  protected $UnlikeModel;
  protected $PostModel;
  protected $KomentarModel;

  protected $TopikKomentarModel;

  public function __construct()
  {
    $this->LikeModel = new LikeModel();
    $this->UnlikeModel = new UnlikeModel();
    $this->PostModel = new PostModel();
    $this->KomentarModel = new KomentarModel();
    $this->TopikKomentarModel = new TopikKomentarModel();
  }
	public function index()
	{
		alert('halo');
	}

  public function submitKomentar()
  {
    $request = service("request");
		$session = session();
		$id_user = $session->get("user");

		$id_post =  $request->getGet("id_post");
		$isi_komentar =  htmlspecialchars($request->getPost("Isi_Komentar"));
    //
    // dd($isi_komentar);
    //$post = $this->request->getVar();
    $post['ID_Postingan'] = $id_post;
    $post['ID_Memers'] = $id_user;
    $post['Isi_Komentar'] = $isi_komentar;
    // dd($post);

    $postingan = $this->PostModel->where("ID_Postingan",$id_post)->first();
    $slug = $postingan["Slug"];
    // dd($postingan);
    $this->KomentarModel->save($post);
    return redirect()->to(base_url('public/Pages/Komentar?slug='.$slug));
  }

  public function submitKomentarTopik()
  {
		$id_user = session()->get("user");
    $id_topik = $this->request->getGet("ID_Topik");
    $post = $this->request->getVar();

    $post['ID_Memers'] = $id_user;
    $post['ID_Topik'] = $id_topik;
    //dd($post);
    $this->TopikKomentarModel->save($post);

    return redirect()->to(base_url('public/Pages/Topik?ID_Topik='.$id_topik));
  }

  public function UnlikePost()
  {
    $request = service("request");
		$session = session();
		$id_user = $session->get("user");
		$id_post =  $request->getGet("id_post");

    $post['ID_Postingan'] = $id_post;
    $post['ID_Memers'] = $id_user;

    $sudah = $this->UnlikeModel->where("ID_Postingan", $id_post)->where("ID_Memers", $id_user)->first();
    if (isset($sudah)) {
      // SUDAH PERNAH DISLIKE, JADI HAPUS DARI DB
      $this->UnlikeModel->where("ID_Postingan", $id_post)->where("ID_Memers", $id_user)->Delete();
      $this->PostModel->set("Tidak_Suka",'Tidak_Suka-1',FALSE)->where("ID_Postingan", $id_post)->update();
      $count = $this->PostModel->where("ID_Postingan", $id_post)->select("Tidak_Suka")->first();
      // dd($count);
      $return = [
        "sukses" => "0",
        "count" => $count
      ];
    }else{
      // BELUM PERNAH DISLIKE JADI TAMBAH KE DB
      $this->UnlikeModel->save($post);
      $this->PostModel->set("Tidak_Suka",'Tidak_Suka+1',FALSE)->where("ID_Postingan", $id_post)->update();
      $count = $this->PostModel->where("ID_Postingan", $id_post)->select("Tidak_Suka")->first();
      // dd($count);
      $sudah_like = $this->LikeModel->where("ID_Postingan", $id_post)->where("ID_Memers", $id_user)->first();
      $like="0";
      if (isset($sudah_like)) {
        $like="1";
        // kurangi like pada databse.
        $this->LikeModel->where("ID_Postingan", $id_post)->where("ID_Memers", $id_user)->Delete();
        $this->PostModel->set("Suka",'Suka-1',FALSE)->where("ID_Postingan", $id_post)->update();
      }else {
        $like = "0";
      }
      $jumlah_like = $this->PostModel->select("Suka")->where("ID_Postingan", $id_post)->first();

       $return = [
        "sukses" => "1",
        "count" => $count,
        "like" => $like,
        "jumlah_like"=>$jumlah_like
      ];
    }
    echo json_encode($return);
  }

  public function likePost()
  {
    $request = service("request");
		$session = session();
		$id_user = $session->get("user");
		$id_post =  $request->getGet("id_post");

    $post['ID_Postingan'] = $id_post;
    $post['ID_Memers'] = $id_user;

    $sudah = $this->LikeModel->where("ID_Postingan", $id_post)->where("ID_Memers", $id_user)->first();
    if (isset($sudah)) {
      $this->LikeModel->where("ID_Postingan", $id_post)->where("ID_Memers", $id_user)->Delete();
      $this->PostModel->set("Suka",'Suka-1',FALSE)->where("ID_Postingan", $id_post)->update();
      $count = $this->PostModel->where("ID_Postingan", $id_post)->select("Suka")->first();
      // dd($count);
      $return = [
        "sukses" => "0",
        "count" => $count
      ];
    }else {
      $this->LikeModel->save($post);
      $this->PostModel->set("Suka",'Suka+1',FALSE)->where("ID_Postingan", $id_post)->update();
      $count = $this->PostModel->where("ID_Postingan", $id_post)->select("Suka")->first();
      // dd($count);
      $sudah_dislike = $this->UnlikeModel->where("ID_Postingan", $id_post)->where("ID_Memers", $id_user)->first();
      $dislike = "0";
      if (isset($sudah_dislike)) {
        $dislike = "1";
        $this->UnlikeModel->where("ID_Postingan", $id_post)->where("ID_Memers", $id_user)->Delete();
        $this->PostModel->set("Tidak_Suka",'Tidak_Suka-1',FALSE)->where("ID_Postingan", $id_post)->update();
      }else {
        $dislike = "0";
      }
      $jumlah_dislike = $this->PostModel->select("Tidak_Suka")->where("ID_Postingan", $id_post)->first();
       $return = [
        "sukses" => "1",
        "count" => $count,
        "dislike" => $dislike,
        "jumlah_dislike"=>$jumlah_dislike
      ];
    }
    echo json_encode($return);
  }




	//--------------------------------------------------------------------

}
