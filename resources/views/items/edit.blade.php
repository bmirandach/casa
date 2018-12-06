@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<br>
			<h3>Editar stock de {{ $stock->item->nombre }}</h3>

				{{ Form::model($stock, ['route' => ['stock.update', $stock->id], 'method' => 'PATCH']) }}

				{{ csrf_field() }}
		
				<h4>Disponible</h4>
				<div class="form-group">
				<span class="input-number-decrement" onclick="disminuye('cantidad')" >–</span><input id="cantidad" name="cantidad" size="3" class="input-number" maxlength="2" type="text" value="{{$stock->stock}}"><span class="input-number-increment" onclick="aumenta('cantidad')">+</span>
				</div>
				<h4>Ideal</h4>
				<div class="form-group">
				<span class="input-number-decrement" onclick="disminuye('ideal')">–</span><input id="ideal" name="ideal"size="3" class="input-number" maxlength="2" type="text" value="{{$stock->cantidad_ideal}}"><span class="input-number-increment" onclick="aumenta('ideal')">+</span>
				</div>
				<div class="form-group">
          			<button type="submit" class="btn btn-sm btn-success">Editar</button>
      			</div>
      			<br>
      			@include('layouts.errors')
      		{{ Form::close() }}
			
		</div>
	</div>
</div>

<script>
	function disminuye(id) {
	    var min = 0;
	    var value = document.getElementById(id).value;
	    value--;
	    if(value >= min) {
	      document.getElementById(id).value = value;
	    }
    }

	function aumenta(id) {
	    var max = 50;
	    var value = document.getElementById(id).value;
	    value++;
	    if(value <= max) {
	      document.getElementById(id).value = value;
	    }
	}
</script>
	
@endsection
