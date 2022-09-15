<?php
namespace App\Controllers;

use App\Models\MemersModel;
use App\Models\LanggananProModel;

class Pembayaran extends BaseController
{
	protected $LanggananProModel;

	public function __construct()
  {
    $this->LanggananProModel = new LanggananProModel();

  }

	public function index()
	{
    	echo view('Pages/Home');
	}
	public function BayarPro()
	{
		\Midtrans\Config::$serverKey = 'SB-Mid-server-HAp6s9bUtxc6oqjOhQ441HvH';
		$idmemers =  $this->request->getGet("ID_Memers");
		// select data memers yang berlangganan
		$email =  $this->request->getGet("Email");
		$totalharga =  $this->request->getGet("TotalHarga");
		// echo "ngentot";

		if ($idmemers != null) {
			$memers = new MemersModel();
			$ArMemers = $memers->find($idmemers);
			//dd($ArMemers);
			// $items = array(
			// 		array(
			// 				'id'       => 'item1',
			// 				'price'    => $totalharga,
			// 				'quantity' => 1,
			// 				'name'     => 'Langganan Pro 1 Hari'
			// 		)
			// 	);
			if ($totalharga == 5000) {
				$items = array(
						array(
								'id'       => 'item1',
								'price'    => $totalharga,
								'quantity' => 1,
								'name'     => 'Langganan Pro 1 Hari'
						)
					);
			}elseif ($totalharga == 15000) {
				$items = array(
						array(
								'id'       => 'item1',
								'price'    => $totalharga,
								'quantity' => 1,
								'name'     => 'Langganan Pro 7 Hari'
						)
					);
			} else {
				$items = array(
						array(
								'id'       => 'item1',
								'price'    => $totalharga,
								'quantity' => 1,
								'name'     => 'Langganan Pro 1 Tahun'
						)
					);
			}
			// Populate customer's billing address
			$billing_address = array(
					'first_name'   => "adun",
					'last_name'    => "adin",
					'address'      => "Karet Belakang 15A, Setiabudi.",
					'city'         => "Jakarta",
					'postal_code'  => "51161",
					'phone'        => "081322311801",
					'country_code' => 'IDN'
			);

			// Populate customer's shipping address
			$shipping_address = array(
					'first_name'   => "John",
					'last_name'    => "Watson",
					'address'      => $ArMemers['Email'],
					'phone'        => "081322311801",
					'country_code' => 'IDN'
			);

			// Populate customer's info
			$customer_details = array(
					'first_name'       => $ArMemers['Email'],
					'email'						 => $ArMemers['Email']
			);
			$params = array(
					'transaction_details' => array(
							'order_id' => rand(),
							'gross_amount' => 10000,
					),
					'item_details'        => $items,
					'customer_details'    => $customer_details
			);

			$json = [
					'snapToken' => \Midtrans\Snap::getSnapToken($params)
			];
		}else {
			$json =[
				'error' => 'Login dulu broo'
			];
		}
		$credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute',
            'duration'  => 2
        );
		// echo json_encode($json);
		$payments =  array(
				 "mandiri_clickpay", "cimb_clicks",
				 "bca_klikbca", "bca_klikpay", "bri_epay",
				 "bca_va", "bni_va"
				);

		$transaction_data = array(
				// 'transaction_details'=> $transaction_details,
				'item_details'       => $items,
				'customer_details'   => $customer_details,
				'credit_card'        => $credit_card,
				'expiry'             => $custom_expiry,
				'enabled_payments'  => $payments
			);
		error_log(json_encode($transaction_data));
		$snapToken = $json["snapToken"];
		error_log($snapToken);
		echo $snapToken;
	}

	//--------------------------------------------------------------------

}
