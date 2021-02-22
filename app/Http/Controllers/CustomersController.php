<?php

namespace App\Http\Controllers;
require 'C:\wamp64\www\ecommerce\vendor\autoload.php';
use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;

class CustomersController extends Controller
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
        $customers = $woocommerce->get("customers");
        //var_dump($customers);
        return view('customers.index')->with('customers', $customers);
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
