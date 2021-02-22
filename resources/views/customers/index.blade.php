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
        @if(count($customers) > 0)
        <div class="container">
            <div>
                <table style="border-width:thick;" class='table table-bordered'>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nom d'utilisateur</th>
                            <th>Nom complet</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Adresse</th>
                            <th>Date de création</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($customers as $customer): ?> 
                    <tr> 
                           <td><img src={{$customer->avatar_url}} width="42" height="42"/>
                           <td><?= $customer->first_name.' '.$customer->last_name ?></td>
                           <td><?= $customer->username ?></td>
                           <td><?= $customer->email ?></td>
                           <td><?= $customer->billing->phone ?></td>
                           <td><?= $customer->billing->address_1. ' ' .$customer->billing->city. ' ' .$customer->billing->country ?></td>
                           <td><?= $customer->date_created ?></td>
                    </tr>
                      <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
      </div>
        @endif        
	</div>
@endsection