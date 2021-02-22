<?php

namespace App\Http\Controllers;
require 'C:\wamp64\www\ecommerce\vendor\autoload.php';
use Automattic\WooCommerce\Client;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $woocommerce = new Client(
            'http://localhost/wordpress/', 
            'ck_e24518c21864a3cbd1e4cad7808d3cadd27c7a56', 
            'cs_d99cdf6ddd0c3be06848c630ae1b5c17ac81f860',
            [
                'wp_api' => true, 'version' => 'wc/v3',
            ]
        );
        $orders = $woocommerce->get("orders");
        //var_dump($orders);
        return view('orders.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $woocommerce = new Client(
            'http://localhost/wordpress/', 
            'ck_e24518c21864a3cbd1e4cad7808d3cadd27c7a56', 
            'cs_d99cdf6ddd0c3be06848c630ae1b5c17ac81f860',
            [
                'wp_api' => true, 'version' => 'wc/v3',
            ]
        );
        
        $order = $woocommerce->get('orders/'.$id);
        return view('orders.edit')->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $woocommerce = new Client(
            'http://localhost/wordpress/', 
            'ck_e24518c21864a3cbd1e4cad7808d3cadd27c7a56', 
            'cs_d99cdf6ddd0c3be06848c630ae1b5c17ac81f860',
            [
                'wp_api' => true, 'version' => 'wc/v3',
            ]
        );

        $status= $request->input('status');

        $data = [
            'status' => $status
        ];

        $woocommerce->put('orders/'.$id, $data);

        return redirect('/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
