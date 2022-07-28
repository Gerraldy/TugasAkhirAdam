<?php namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email extends BaseController
{
	public function index()
	{

	}
  public function send_email() {

         $email          = $this->request->getPost('Email');
				 // dd($email);
         $mail = new PHPMailer(true);

			try {
         $mail->isSMTP();
         $mail->Host         = 'smtp.gmail.com'; //smtp.google.com
         $mail->SMTPAuth     = true;
         $mail->Username     = 'bejo.lego9999@gmail.com';
         $mail->Password     = 'oooOOO000!';
         $mail->SMTPSecure   = 'ssl';
         $mail->Port         = 465;

         $mail->setFrom('bejo.lego9999@gmail.com', 'Admin Memetube');
			   $mail->addAddress($email);
				 $mail->addReplyTo('bejo.lego9999@gmail.com', 'Admin Memetube');

         $mail->isHTML(true);
			   $mail->Subject      = 'MemeTube - Email Reset';
			   $mail->Body         = 'Reset Password gan';

				 $mail->send();

		         // Pesan Berhasil Kirim Email/Pesan Error

		     session()->setFlashdata('success', 'Selamat, email berhasil terkirim!');
				 
     } catch (Exception $e) {
			 	 session()->setFlashdata('error', "Gagal mengirim email. Error: " . $mail->ErrorInfo);
     }

     }

	//--------------------------------------------------------------------

}
