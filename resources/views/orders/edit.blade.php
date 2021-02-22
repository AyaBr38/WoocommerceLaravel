@extends('layouts.app')

@section('content')
   <h1 style="color:white;font-weight:bold;">Modifier Commande :</h1>
   <div style="background-color: rgba(255,255,255, 0.5);border-radius: 4px;padding: 10px 20px;margin-bottom:5px;">
   {!! Form::open(['action' => ['OrdersController@update', $order->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}        
        <div class="form-group">
            {{Form::label('statut', 'Statut :' ,['style' => 'color:black;'])}}
            {{Form::select('status', array('pending'=> 'Pending', 'processing' =>'Processing', 'on-hold' => 'On-hold', 'completed' => 'Completed', 'cancelled' =>'Cancelled', 'refunded' => 'Refunded', 'failed' => 'Failed', 'trash' => 'Trash'))}}
        </div>
    </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection