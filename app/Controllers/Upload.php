<?php
namespace App\Controllers;

use App\Models\UploadModal;
use App\Models\MemersModel;

class Upload extends BaseController
{

  protected $UploadModel;
  protected $MemersModel;

  public function __construct()
  {
    $this->UploadModal = new UploadModal();
    $this->MemersModel = new MemersModel();
  }

	public function upload()
	{
    $session = session();
    $id_user = $session->get("user");
    $file = $this->request->getFile('Nama_Gambar');
    $fileName = $file->getRandomName();
    $username = $this->MemersModel->select("Username")->where("ID_Memers", $id_user)->first();

		$file->move('uploads/gambar_post/', $fileName);
    $slug = url_title($this->request->getVar('Judul'), '-', true);
    $post = $this->request->getVar();
    // dd($slug);
    $post['Nama_Gambar'] = $fileName;
    $post['ID_Memers'] = $id_user;
    $post['Username'] = $username;
    $post['Slug'] = $slug;
    $post['Suka'] = "0";
    $post['Tidak_Suka'] = "0";
    if (!isset($post["NSFW"])) {
      $post["NSFW"] = "0";
    }else{
      $post["NSFW"] = "1";
    }
    // $post["URL"] = 'amkdsaksdpo';
    // dd($post);
   //$this->UploadModal->save($post);

    //  $session->setFlashdata('sukses-registrasi',"1");
    return redirect()->to(base_url('public/'));
		// return view('welcome_message');
	}

	//--------------------------------------------------------------------

}
