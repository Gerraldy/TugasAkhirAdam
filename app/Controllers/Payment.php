<?php

namespace App\Controllers;

class Payment extends BaseController
{
    public function index() {
        \Midtrans\Config::$serverKey = 'SB-Mid-server-HAp6s9bUtxc6oqjOhQ441HvH';
      $id = session()->get('user');
      if ($id != null) {

        // Populate items
        $items = array(
            array(
                'id'       => 'item1',
                'price'    => 100000,
                'quantity' => 1,
                'name'     => 'Adidas f50'
            ),
            array(
                'id'       => 'item2',
                'price'    => 50000,
                'quantity' => 2,
                'name'     => 'Nike N90'
            )
        );

        // Populate customer's billing address
        $billing_address = array(
            'first_name'   => "Andri",
            'last_name'    => "Setiawan",
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
            'address'      => "Bakerstreet 221B.",
            'city'         => "Jakarta",
            'postal_code'  => "51162",
            'phone'        => "081322311801",
            'country_code' => 'IDN'
        );

        // Populate customer's info
        $customer_details = array(
            'first_name'       => "Andri",
            'last_name'        => "Setiawan",
            'email'            => "test@test.com",
            'phone'            => "081322311801",
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'item_details'        => $items,
            'customer_details'    => $customer_details
        );

        $data = [
            'snapToken' => \Midtrans\Snap::getSnapToken($params)
        ];

        return view('Pages/pay', $data);
      }else {
        $data = [
          'title' => "Login!"
        ];
        $message = "Login Dulu Brooo!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        return view('Pages/Login', $data);
      }

    }

    public function Bayar()
    {
      // code...
    }

}
