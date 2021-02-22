<?php

namespace App\Http\Controllers;
require 'C:\wamp64\www\ecommerce\vendor\autoload.php';

use Automattic\WooCommerce\Client;
use Illuminate\Http\Request;
use Excel;

class ProductsController extends Controller
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
        $products = $woocommerce->get("products", ['per_page'=>50]);
        //var_dump($products);
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $woocommerce = new Client(
            'http://localhost/wordpress/', 
            'ck_e24518c21864a3cbd1e4cad7808d3cadd27c7a56', 
            'cs_d99cdf6ddd0c3be06848c630ae1b5c17ac81f860',
            [
                'wp_api' => true, 'version' => 'wc/v3',
            ]
        );

        $this->validate($request , [ 
            'name' => 'required',
            'price' => 'required'
        ]);

        $name= $request->input('name');
        $price= $request->input('price');
        $description = $request->input('description');
        $on_sale= $request->input('on_sale');
        $sale_price= $request->input('sale_price');
        $stock_statuts= $request->input('stock_status');

        switch ($request->input('categories')) {
            case 'Clothing':
                $idc=16;
                break;
            case 'Accessories':
                $idc=19;
                break;
            case 'Hoodies':
                $idc=18;
                break;
            case 'Tshirts':
                $idc=17;
                break;
            case 'Decor':
                $idc=21; 
                break;
            case 'Food':
                $idc=31; 
                break;
            case 'Music':
                $idc=20;
                break;
            default: $idc=15; break;
        }

        if($on_sale==false) $sale_price=''; 

        $data = [
            'name' => $name,
            'regular_price' => $price,
            'description' => $description,
            'on_sale' => $on_sale,
            'sale_price' => $sale_price,
            'stock_status' => $stock_statuts,
            'categories' => [['id' => $idc]]
            /*'images' => [[
                'src' => $request->file('image')->getRealPath(),
                'name' => $request->file('image')->getClientOriginalName(),
                'alt' => substr($request->file('image')->getClientOriginalName(),2,2) 
            ]] */
            ];
        
        $woocommerce->post('products', $data);

        return redirect('/products');
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
        
        $product = $woocommerce->get('products/'.$id);
        return view('products.edit')->with('product',$product);
        
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

        $this->validate($request , [ 
            'name' => 'required',
            'price' => 'required'
        ]);

        $name= $request->input('name');
        $price= $request->input('price');
        $description = $request->input('description');
        $on_sale= $request->input('on_sale');
        $sale_price= $request->input('sale_price');
        $stock_statuts= $request->input('stock_status');

        switch ($request->input('categories')) {
            case 'Clothing':
                $idc=16;
                break;
            case 'Accessories':
                $idc=19;
                break;
            case 'Hoodies':
                $idc=18;
                break;
            case 'Tshirts':
                $idc=17;
                break;
            case 'Decor':
                $idc=21; 
                break;
            case 'Food':
                $idc=31; 
                break;
            case 'Music':
                $idc=20;
                break;
            default: $idc=15; break;
        }

        if($on_sale==false) $sale_price='';
        $data = [
            'name' => $name,
            'regular_price' => $price,
            'description' => $description,
            'on_sale' => $on_sale,
            'sale_price' => $sale_price,
            'stock_status' => $stock_statuts,
            'categories' => [['id' => $idc]]
            ];
        
        $woocommerce->put('products/'.$id, $data);

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $woocommerce = new Client(
            'http://localhost/wordpress/', 
            'ck_e24518c21864a3cbd1e4cad7808d3cadd27c7a56', 
            'cs_d99cdf6ddd0c3be06848c630ae1b5c17ac81f860',
            [
                'wp_api' => true, 'version' => 'wc/v3',
            ]
        );
        
        $woocommerce->delete('products/'.$id, ['force' => true]);
        return redirect('/products'); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function excel()
    {
        $woocommerce = new Client(
            'http://localhost/wordpress/', 
            'ck_e24518c21864a3cbd1e4cad7808d3cadd27c7a56', 
            'cs_d99cdf6ddd0c3be06848c630ae1b5c17ac81f860',
            [
                'wp_api' => true, 'version' => 'wc/v3',
            ]
        );
        $products = $woocommerce->get("products", ['per_page'=>100]);
        $products_array[] = array('Nom produit', 'Prix de produit', 'Date de création', 'Description', 'Catégorie', 'Solde', 'Prix apres solde','Stock');
        foreach($products as $product){
            $products_array[] = array(
                'Nom produit' => $product->name, 
                'Prix de produit'=> $product->regular_price,
                'Date de création' => $product->date_created,
                'Description' => $product->description , 
                'Catégorie' => $product->categories[0]->name,
                'Solde' => $product->on_sale,
                'Prix apres solde' => $product->sale_price ,
                'Stock' => $product->stock_status
            );
        }
        Excel::create('Products_Data', function($excel) use(
            $products_array){
                $excel->setTitle('Products_Data');
                $excel->sheet('Products_Data', function($sheet) use(
                    $products_array){
                     $sheet->fromArray($products_array, null, 'A1', false, false); 
                    });
            })->download('xlsx');
    }
}
