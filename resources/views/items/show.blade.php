@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-sm-6">
			<h1> {{$item->nombre}} </h1>

			<!--<a href="">editar stock ideal</a>
			{{$item->id}}  y lo que esta en el text del editar
			-->
			<h4>Stock disponible: {{$item->stock->stock}}</h4>

			<h4>Stock ideal: {{$item->stock->cantidad_ideal}}</h4>

			<h4>Última vez editado por: {{$item->stock->usuario->name}}</h4>

			<h4>Última vez editado en: {{$item->stock->updated_at->toFormattedDateString()}}</h4>

			<a href="/items/{{$item->stock->id}}/editar">Editar</a>

		</div>

	</div>
</div>
	
@endsection

