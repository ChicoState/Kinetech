<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Kinetech</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <!-- Bootstrap -->
  <!-- <link href="resources/assets/bootstrap/css/bootstrap.css" rel="stylesheet"> -->

  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i"
        rel="stylesheet">


  <!-- Custom App CSS -->
  <link   href="{{asset('css/app.css')}}" rel="stylesheet">
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('js/cart.js')}}"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    .member a{cursor:pointer;}
    .member .hide{display:none;}
  </style>

  <script>
      $(document).ready(function(){
          $(".member>a").click(function(){
              $(this).next("ul").toggleClass("hide");
          });
      });
  </script>
</head>
<body class="container-fluid">
  <!-- Include partial with logo and search bar -->
  @include('partials.nav')
  <main class="content">

    <!-- Yield home if project root '/' is requested -->
    @yield('home')

    <!-- Yield view from 'views/about/about.blade.php' if '/about' is requested -->
    @yield('about')

    @yield('productFilter')
    @yield('cartStats')
      <div class="mx-auto">
        @yield('content')
        @yield('products')
        @yield('cartView')
      </div>

  </main>
  @include('partials.footer')
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>
