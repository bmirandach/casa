@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<br>
			<h3>Editar</h3>

				{{ Form::model($stock, ['route' => ['stock.update', $stock->id], 'method' => 'PATCH']) }}

				{{ csrf_field() }}
		
				<h4>Stock disponible</h4>
				<span class="input-number-decrement" onclick="disminuye('cantidad')" name="cantidad">–</span><input id="cantidad" size="3" class="input-number" maxlength="2" type="text" value="{{$stock->stock}}"><span class="input-number-increment" onclick="aumenta('cantidad')">+</span>
				<br><br>
				<h4>Stock ideal</h4>
				<span class="input-number-decrement" onclick="disminuye('ideal')" name="ideal">–</span><input id="ideal" size="3" class="input-number" maxlength="2" type="text" value="{{$stock->cantidad_ideal}}"><span class="input-number-increment" onclick="aumenta('ideal')">+</span>
				<br><br>
				<div class="col-sm-4">
          			<button type="submit" class="btn btn-sm btn-success">Editar</button>
      			</div>
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
