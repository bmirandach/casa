<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ListPicker.js Demo</title>
  <link href="https://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
  <!--<link rel="stylesheet" href="src/list-picker.css">-->

<script src="{{ asset('js/list-picker.js') }}" defer></script>
<link href="{{ asset('css/list-picker.css') }}" rel="stylesheet">
<link href="{{ asset('css/casa.css') }}" rel="stylesheet">
</head>
<body>
	<!--<div>
	@foreach($items as $item)
	<li>{{$item->nombre}}</li>
	@endforeach
</div>-->
<section>
  <h1>DRAG AND DROP HTML5</h1>
<nav class="proximos">
  <h2>Próximos</h2>
  <!--<div class="adder">
    <input type="text" class="input" placeholder="Add items in your list"/>
    <span class="add">+</span>
  </div>-->
  <ul>
    @foreach($items as $item)

      <li class="draggable" draggable="true">{{$item}}</li>
  @endforeach

  </ul>
</nav>
<article class="compras">
  <h2>Lista de compras</h2>
  <div class="adder">
    <input type="text" class="input" placeholder="Add items in your list"/>
    <span class="add">+</span>
  </div>
  <ul id="lista">
    @foreach($stock as $stk)
      <li class="draggable" draggable="true">{{$stk}}</li>
  @endforeach

  </ul>
</article>
</section>
<script src="{{ asset('js/casa.js') }}" defer></script>


  <!--<div class="list-picker">
    <ul id="options" class="list-picker-list" style="height: 458px;">
    	<li class="list-picker-list-item" data-option-index="0" data-option-value="ActionScript" style="top: 0px; left: 0px;">1</li>
    	<li class="list-picker-list-item" data-option-index="7" data-option-value="Ruby" style="top: 51px; left: 0px;">8</li>
    	<li class="list-picker-list-item" data-option-index="8" data-option-value="Swift" style="top: 102px; left: 0px;">9</li>
    	<li class="list-picker-list-item" data-option-index="4" data-option-value="Java" style="top: 153px; left: 0px;">5</li>
    	<li class="list-picker-list-item" data-option-index="5" data-option-value="JavaScript" style="top: 204px; left: 0px;">6</li>
    </ul>
    <ul id="picks" class="list-picker-list">
    	<li class="list-picker-list-item" data-option-index="1" data-option-value="CSS" style="top: 0px; left: 0px;">2</li>
    	<li class="list-picker-list-item" data-option-index="3" data-option-value="HTML" style="top: 51px; left: 0px;">4</li>
    	<li class="list-picker-list-item" data-option-index="6" data-option-value="Python" style="top: 102px; left: 0px;">7</li>
    	<li class="list-picker-list-item" data-option-index="2" data-option-value="C#" style="top: 153px; left: 0px;">3</li>
    </ul>
  </div>-->

  <script src="{{ asset('js/list-picker.js') }}"></script>
  <script>
    var list = ['ActionScript', 'CSS', 'C#', 'HTML', 'Java', 'JavaScript', 'Python', 'Ruby', 'Swift'];
    
    /*
     * Config 1
     * Descending
     * Reseting
    */
    // var listPicker = new ListPicker({
    //   list: list,   // Array list
    //   gap: 1,       // Gap between items
    //   order: 'asc', // Ordering in second list
    //   reset: true   // Reseting when picked 
    // });

    /*
     * Config 2
     * Descending
     * Reseting
    */
    // var listPicker = new ListPicker({
    //   list: list,
    //   gap: 1,
    //   order: 'desc',
    //   reset: true
    // });

    /*
     * Config 3
     * Not Ordering
     * Reseting
    */
    var listPicker = new ListPicker({
      list: list,
      gap: 1,
      reset: true
    });

    /* 
     * Config 4
     * Not Reseting overrides Ordering. 
     * Sorry! (or not) :)
    */
    // var listPicker = new ListPicker({
    //   list: list,
    //   gap: 1
    // });


    //@foreach()

    document.querySelector('#get-picks').addEventListener('click', function() {
      alert('' + listPicker.getPicks());
    });
  </script>
</body>
</html>