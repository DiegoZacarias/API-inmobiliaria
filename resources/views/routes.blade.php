@extends('welcome')
@section('content')
		<div class="row">
				<h1>Rutas</h1>
				<p>Todas las rutas</p>
<div class="table-div">
	
		<table class="table">
  <thead>
    <tr>
      <th scope="col">Url</th>
      <th scope="col">Metodo</th>
      {{-- <th scope="col">Nombre</th> --}}
    </tr>
  </thead>
  <tbody>
    @foreach ($routeCollection as $route)
	    <tr>
	      <td>{{$route->uri}}</td>
	      <td>{{$route->methods[0]}}</td>
	      {{-- <td>{{$route->uri}}</td> --}}
	    </tr>
    @endforeach
    
  </tbody>
</table>

</div>
		</div>

@endsection