<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Voltanium</title>

    <!-- Bootstrap -->
    <link href="resources/assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom App CSS -->
    <link href="resources/assets/bootstrap/css/app.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  		<button class="navbar-toggler navbar-toggler-right" 
				type="button" data-toggle="collapse" 
				data-target="#navbarNav" aria-controls="navbarNav" 
				aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
  		<a class="navbar-brand" href="/">Voltanium</a>
  		<div class="collapse navbar-collapse" id="navbarNav">
    		<ul class="navbar-nav">
      			<li class="nav-item">
        			<a class="nav-link" href="/">Home</a>
     			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="/columns">Columns</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link"></a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link disabled"></a>
      			</li>
    		</ul>
  		</div>
	</nav>
	@yield('splash')
	@yield('columns')
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="resources/assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

