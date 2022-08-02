<?php namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use App\Models\MemersModel;
class Email extends BaseController
{
	protected $MemersModel;

	public function __construct()
	{
			$this->MemersModel = new MemersModel();
	}
	public function index()
	{

	}
  public function send_email() {

         $email = $this->request->getPost('Email');
				 $code = uniqid(true);
				 // dd($email);
         $mail = new PHPMailer(true);
				 $cek = $this->MemersModel->where("Email", $email)->first();
				 if ($cek != null) {
					 $this->MemersModel->update($cek['ID_Memers'], ['Password' => $code]);
					 try {
 		         $mail->isSMTP();
 		         $mail->Host         = 'smtp.gmail.com'; //smtp.google.com
 		         $mail->SMTPAuth     = true;
 		         $mail->Username     = 'adun.memetube@gmail.com';
 		         $mail->Password     = 'mfismokfeiskvwot';
 		         $mail->SMTPSecure   = 'ssl';
 		         $mail->Port         = 465;

 		         $mail->setFrom('admin.memetube@yopmail.com', 'Admin Memetube');
 					   $mail->addAddress($email);
 						 $mail->addReplyTo('admin.memetube@yopmail.com', 'Admin Memetube');

 		         $mail->isHTML(true);
 					   $mail->Subject      = 'MemeTube - Password Reset';
 					   $mail->Body         = 'Reset Password gan, nih Passwordnya '.$code.'<br> cara ubah password : Akun -> Setting -> Password';

 						 $mail->send();

 				         // Pesan Berhasil Kirim Email/Pesan Error

 				    session()->setFlashdata('success', 'Selamat, email berhasil terkirim!');
 						return redirect()->to(base_url('public/Pages/Login'));
 		     } catch (Exception $e) {
 					 	 session()->setFlashdata('error', "Gagal mengirim email. Error: " . $mail->ErrorInfo);
 						 return redirect()->to(base_url('public/Auth/LupaPassword'));
 		     }
			 }else {
			 	session()->setFlashdata('error', "Email Tidak Terdaftar.");
				return redirect()->to(base_url('public/Auth/LupaPassword'));
			 }


     }

	//--------------------------------------------------------------------

}
