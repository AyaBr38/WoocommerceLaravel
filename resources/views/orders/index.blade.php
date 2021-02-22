@extends('layouts.app')

@section('content')
<style>
    td {
        color: black;
        background-color: rgba(255,255,255, 0.5);
    }
    th {
        color: black;
        background-color: white;
        font-weight: bold;
        font-size: 15px;
    }
 </style>
    <div class="row">
        @if(count($orders) > 0)
        <div class="container">                     
            <div>
                <table style="border-width:thick;" class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Nombre de commande</th>
                            <th>Client</th>
                            <th>Adresse de livraison</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Date de commande</th>
                            <th>Montant de commande</th>
                            <th>Statut</th>
                            <th>Methode de paiement</th>
                            <th>Montant d'expédition</th>
                            <th>Devise</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
<?php foreach ($orders as $order): ?> 
<tr><td><?= $order->id ?></td>
     <td><?= $order->billing->first_name. ' ' .$order->billing->last_name ?></td>
     <td><?= $order->shipping->address_1. ' ' .$order->shipping->city. ' ' .$order->shipping->country ?></td>
     <td><?= $order->billing->phone ?></td>
     <td><?= $order->billing->email ?></td>
     <td><?= $order->date_created ?></td>
     <td><?= $order->total ?></td>
     <td><?= $order->status ?></td>
     <td><?= $order->payment_method_title ?></td>
     <td><?= $order->shipping_total ?></td>
     <td><?= $order->currency ?></td>
     <td>
        <a href="/ecommerce/public/orders/{{$order->id}}/edit" class="btn btn-success">Modifier</a>
    </td>
     </tr>
<?php endforeach; ?>
                    </tbody>
                </table>
            </div>
</div>
        @endif        
	</div>
@endsection