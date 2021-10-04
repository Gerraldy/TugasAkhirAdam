<?php namespace App\Controllers;

class test extends BaseController
{
	public function index()
	{

		//$this->load->helper('url');
		//echo helper('url');
		// echo "halo";
		$request = service("request");
		$session = session();
		$id_user = $session->get("user");
		$id_post =  $request->getGet("id_post");
		// echo $id_user;
    // $data['title'] = "hello world!";
		// echo view('test_view', $data);
	}
	public function timeline()
	{
		$data['tittle'] = "Ini Timeline yah!";
		echo view('Timeline', $data);
	}

	//--------------------------------------------------------------------

}
