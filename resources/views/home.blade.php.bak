<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WiberLG</title>

        <!-- Fonts -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="{{ url('/style.css') }}" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">


<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
	<br><img class="m-5" src="{{ url('logo.png') }}"><br>
    </div><br>
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <!-- Form -->
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




    <div class="form-group col-md-6">
      <label for="inputCity">Direccion IP</label>
    <input type="ip" class="form-control" name="ip" id="exampleInputEmail1" aria-describedby="ipHelp" placeholder="ej 10.101.10.1">
    <small id="emailHelp" class="form-text text-muted">Requerida.</small>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Mascara</label>
      <select id="inputState" name="mask" class="form-control">
        <option selected>32</option>
        <option>24</option>
        <option>23</option>
        <option>22</option>
        <option>21</option>
      </select>
    </div>


<br>
<br>
<br>

  <div class="form-group">
<button type="submit" class="btn btn-default">Ver</button>
</div>


            </form>
            <!-- Form end -->
        </div>
    </div>


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



    </div>

</div>


			


                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
