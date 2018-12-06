@extends('layouts.app')
@section('title', 'Listas')
@section('content')

<div class="container">
  <div class="proximos">
    <h2>Próximos</h2>
    <ul>

      @foreach($stocks as $stock)
        @if($stock->stock == $stock->cantidad_ideal)
          <li class="draggable" draggable="true"><a href="/items/{{$stock->id}}/editar">{{$stock->item->nombre}}</a></li>
        @endif
      @endforeach

    </ul>
  </div>
  <div class="compras">
    <h2>Lista de compras</h2>
    <div class="adder">
      <input type="text" class="input" placeholder="Añade items a la lista"/> 
      <span class="add">+</span>
    </div>
    <ul id="lista">
      @foreach($stocks as $stock)
        @if($stock->stock < $stock->cantidad_ideal)
          <li class="draggable" draggable="true"><a href="/items/{{$stock->id}}/editar">{{$stock->item->nombre}}</a></li>
        @endif
      @endforeach
    </ul>
  </div>
</div>

<script src="{{ asset('js/casa.js') }}" defer></script>

@endsection