@extends('layouts.app')


@section('content')
<div class="container">

  <h1> Stock disponible </h1>
  <p>En esta tabla se encuentran todos los productos con stock disponible.</p> 

  <form>

    <select>
      <option value="0"> Categorias </option>
      @foreach($categories as $category)
          <option value="{{$category->id}}"> {{$category->nombre}} </option>
        @endforeach
    </select>
    <input id="elNombre" type="text" placeholder="nombre del producto...">
    <br><br>
    
    <table>
      <thead>
        <tr>
          <th>Producto</th>
          <th>Categoría</th>
        </tr>
      </thead>
      <tbody id="laTabla">
        @foreach($items as $stk)
        @if($stk->stock > 0)
        <tr>
          <td><a href="/items/{{$stk->item->id}}">{{$stk->item->nombre}}</a></td>
          <td>{{$stk->item->category->nombre}}</td>
        </tr>
        @endif
        @endforeach       
      </tbody>
    </table>
    
  </form>
  <br>

  <h1>No disponibles</h1>
  <form>
    <input id="elNombreB" type="text" placeholder="nombre del item...">
    <br><br>
    <table>
      <thead>
        <tr>
          <th>Producto</th>
          <th>Categoría</th>
        </tr>
      </thead>
      <tbody id="laTablaB">
        @foreach($items as $nstk)
        @if($nstk->stock == 0)
        <tr>
          <td><a href="/items/{{$nstk->item->id}}">{{$nstk->item->nombre}}</a></td>
          <td>{{$nstk->item->category->nombre}}</td>
        </tr>
        @endif
        @endforeach       
      </tbody>
    </table>
  </form>
</div>
@endsection