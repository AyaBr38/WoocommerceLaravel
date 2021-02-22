<?php

namespace App\Http\Controllers;
require 'C:\wamp64\www\ecommerce\vendor\autoload.php';
use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Illuminate\Support\Facades\Session;

class ConnectionController extends Controller
{
    public function logout(){
        Session::put('woo_host','foo');
        Session::put('woo_key','foo');
        Session::put('woo_secret','foo');
        return redirect('/public');
    }

    public function connection(Request $request){

        $woocommerce = new Client(
            $request->host,
            $request->key,
            $request->secret,
            [
                'wp_api' => true,
                'version' => 'wc/v3',
            ]
        );
        Session::put('woo_host',$request->host);
        Session::put('woo_key',$request->key);
        Session::put('woo_secret',$request->secret);
        Session::save();

        return redirect('/products');
    }
}
