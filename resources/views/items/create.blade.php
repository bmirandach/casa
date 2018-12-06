@extends('layouts.app')


@section('content')
<div class="container">

  <h1>Agrega un producto</h1>
  <br>
	<form action="{{route('store')}}" method="POST">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group">
          <strong>Nombre:</strong>
          <input type="text" name="name" class="form-control" placeholder="Nombre del producto">
          <br>
          <strong>Categoría:</strong>
          <br>
          <select name="combo">
  	        <option value="0"> Seleccione... </option>
  	        @foreach($categories as $category)
  	          <option value="{{$category->id}}"> {{$category->nombre}} </option>
  	        @endforeach
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-sm btn-success">Agregar</button>
        </div>
      </div> 
    </div>
    
    @include('layouts.errors')
  </form>

</div>
@endsection