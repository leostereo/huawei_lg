<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WiberLG</title>

		<link rel="stylesheet" type="text/css" href="{{ url('/style.css') }}" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    </head>


  <body class="">





<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-10">
	  <header class="mb-auto">
	    <div>
	     
	      <nav class="nav nav-masthead justify-content-end float-md-end">
		<a class="nav-link" href="https://www.wiber.com.ar/">web</a>
	      </nav>
	    </div>
	  </header>
		<main class="px-3">
		    <img class="m-5" src="{{ url('logo.png') }}">

		<form class="form-example"  method="post" action="{{ route('home') }}">
              		@csrf
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="operation" id="operation" value="route" checked>
			  <label class="form-check-label" for="flexRadioDefault1">
			    Ver rutas
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="operation" id="operation" value="ping">
			  <label class="form-check-label" for="flexRadioDefault1">
			    Ping
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="operation" id="operation" value="trace">
			  <label class="form-check-label" for="flexRadioDefault1">
			    Traceroute
			  </label>
			</div>


			 <div class="row">
			    <div class="col-sm-4">
				<label for="inputCity">Direccion IP</label>
				<input type="ip" class="form-control" name="ip" id="exampleInputEmail1" aria-describedby="ipHelp" placeholder="ej 10.101.10.1">
				<small id="emailHelp" class="form-text text-muted">Requerida.</small>
			    </div>
			    <div class="col-md-auto">
			      <label for="inputState">Mascara</label>
			      <select id="inputState" name="mask" class="form-control">
				<option selected>32</option>
				<option>24</option>
				<option>23</option>
				<option>22</option>
				<option>21</option>
			      </select>
			    </div>
			  </div><br>

			<button class="w-100 btn btn-primary btn-lg" type="submit">ver</button>

		</form><br>

			@if (session('output_arr'))
			    <div class="alert alert-success">
				{{ dd(session('output_arr')) }}
			    </div>
			@endif



		    	@if (count($errors) > 0)
			  <div class="row">
			      <div class="col-md-12">
				  <div class="alert alert-danger alert-dismissible">
				      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				      @foreach($errors->all() as $error)
				      {{ $error }} <br>
				      @endforeach
				  </div>
			      </div>
			  </div>
			@endif


			@if(isset($output_arr))
			    <div class="row justify-content-center align-items-center output">

				@foreach( $output_arr as $line )
				<span>{{$line}}</span><br>
			    @endforeach
			@endif


<!--{{ dd($__data) }}-->




		</main>
    </div>
  </div>
</div>

    
  </body>
