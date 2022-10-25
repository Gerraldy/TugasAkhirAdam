<?php
namespace App\Controllers;
use App\Models\MemersModel;
use App\Models\MemersBanModel;
class Auth extends BaseController
{
  protected $MemersModel;
  protected $MemersBanModel;
  public function __construct()
  {
    $this->MemersModel = new MemersModel();
    $this->MemersBanModel = new MemersBanModel();
  }
  public function register()
  {
    $session = \Config\Services::session();
    //ini diganti pengecekan register
    $email =  $this->request->getVar('email');
    $username =  $this->request->getVar('username');
    $user = $this->MemersModel->where('email',$email)->orWhere('username',$username)->first();
    if ($user!=null) {
      $session->setFlashdata('gagal-registrasi',"1");
    }else{
      // kalau email dan username sudah aman / tidak kembar
      // $this->MemersModel->save([
      //   'Email' => $this->request->getVar('email'),
      //   'Nama' => $this->request->getVar('nama'),
      //   'Username' => $this->request->getVar('username'),
      //   'Password' => $this->request->getVar('password'),
      //   'Status' => 0
      // ]);
      $post = $this->request->getVar();
      $this->MemersModel->save($post);
       $session->setFlashdata('sukses-registrasi',"1");
    }
    //----
    return redirect()->to(base_url('public/Pages/Login'));
  }

  public function Login()
  {
    $data = [
      'title' => "Login!"
    ];
    return view('Pages/Login', $data);
  }
  public function tes(){
      $session->set([
        'tes' => "tes"
      ]);
      echo $session->get('tes');
  }

  public function Masuk()
  {
    $session = \Config\Services::session();
    $email =  $this->request->getVar('email');
    $password =  $this->request->getVar('password');
    $user = $this->MemersModel->where('Email',$email)->orWhere('Password', $password)->first();
    $userban = $this->MemersBanModel->Where('Email', $email)->first();
    if ($user != null) {
      if ($userban != null) {
        $message = "Akun Anda Telah Diban!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        return redirect()->to(base_url('public/Auth/Login'));
      }else {
        $session->setFlashdata('sukses-masuk',"1");
        $session->set([
          'user' => $user['ID_Memers'],
          'status' => $user['Status']
        ]);
      // dd($userban);
        return redirect()->to(base_url('public/'));
      }
    }elseif ($email=='admin' && $password=='admin') {
      //dd($data['laporanpost']);
       echo view('Pages/Admin/AdminDashboard');
    }else{
      $session->setFlashdata('gagal-masuk',"1");
      return redirect()->to(base_url('public/Auth/Login'));
    }
  }

  public function Logout()
  {
    session()->destroy();
    return redirect()->to(base_url('public/'));
  }

  public function LupaPassword()
  {
      echo view('Pages/LupaPassword');
  }


}
