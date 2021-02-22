@extends('layouts.app1')

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
        @if(count($products) > 0)
		<div class="container">
			<div>
				<table style="border-width:thick;" class='table table-bordered'>
					<thead>
						<tr>
							<th></th>
                            <th>Nom de produit</th>
                            <th>Prix de produit</th>
							<th>Date de création</th>
							<th>Description</th>
							<th>Catégorie</th>
							<th>Solde</th>
							<th>Stock</th>
							<th>Actions</th>
							<th>Actions</th>
                        </tr>
                    </thead>
					<tbody>
    	    	<?php foreach ($products as $product) { ?>
					<tr>
			    	    <a href="/ecommerce/public/products/{{$product->id}}">
						</a>
						@if($product->images!=null)
						<td><img src={{$product->images[0]->src}} width="50" height="50"/>
						@else
						<td></td>
						@endif
						<td><?= $product->name ?></td>
			    	    <td><?= $product->regular_price ?>DH</td>
						<td><?= $product->date_created ?></td>
						<td><?= $product->description ?></td>
						<td><?= $product->categories[0]->name ?></td>
						@if($product->on_sale=='true')
						<td><?= $product->sale_price ?>DH</td>
						@else
				        <td>Non soldé</td>
						@endif
						<td><?= $product->stock_status ?></td>
		    	    	<td>
							<a href="/ecommerce/public/products/{{$product->id}}/edit" class="btn btn-success">Modifier</a>
				        </td>
						<td>
							{!!Form::open(['action' => ['ProductsController@destroy', $product->id] , 'method' => 'POST'])!!}
							{{Form::hidden('_method', 'DELETE')}}
							{{Form::submit('Supprimer', ['class'=> 'btn btn-danger'])}}
							{!!Form::close()!!}
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
        @endif        
	</div>
@endsection