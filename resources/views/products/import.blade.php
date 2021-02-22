@extends('layouts.app')

@section('content')
<div style="background-color: rgba(255,255,255, 0.5);border-radius: 4px;padding: 10px 20px;margin-bottom:5px;">
{!! Form::open(['action' => 'Controller@import', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files'=>'true']) !!}
{{ csrf_field() }}
<div class="form-group">
    {{Form::label('file', 'Fichier à choisir :' ,['style' => 'color:black;'])}}
    {{Form::file('file')}}
</div>
</div>
{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection