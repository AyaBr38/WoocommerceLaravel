<?php

namespace App\Http\Controllers;
require 'C:\wamp64\www\ecommerce\vendor\autoload.php';

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Automattic\WooCommerce\Client;
use Illuminate\Http\Request;
use Excel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function excel(){
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

    public function import(Request $request)
    {
        $woocommerce = new Client(
            'http://localhost/wordpress/', 
            'ck_e24518c21864a3cbd1e4cad7808d3cadd27c7a56', 
            'cs_d99cdf6ddd0c3be06848c630ae1b5c17ac81f860',
            [
                'wp_api' => true, 'version' => 'wc/v3',
            ]
        );

        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx,csv'
        ]);

        $path = $request->file('file')->getRealPath();

        $data = Excel::load($path)->get();

        if(count($data) > 0)
        {
            foreach($data->toArray() as $key => $value)
            {
                switch ($value['categorie']) {
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
                    $insert_data = [
                        'name' => $value['nom_produit'], 
                        'regular_price'=> (string) $value['prix_de_produit'],
                        'description' => $value['description'], 
                        'categories' => [['id' => $idc]],
                        'on_sale' => $value['solde'],
                        'sale_price' => (string) $value['prix_apres_solde'],
                        'stock_status' => $value['stock']
                    ];
                    $woocommerce->post('products', $insert_data);
            }
        return redirect('/products');
        }
    }
}
