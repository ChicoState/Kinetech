<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top" style="background-color: rgba(41,43,44,0.8); height: 100px;">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <a class="navbar-brand" href="#">Kinetech</a>
    <div class="row">
        <div class="d-flex flex-col col-xs-5 col-sm-5 col-md-8 col-lg-12">
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="height:70px;">
                <ul class="navbar-nav p-3">
                    <li class="nav-item active">
                        <a class="text-info nav-link" href="/">HOME</a>
                    </li>
                    <li class="nav-item ">
                        <a class="text-info nav-link" href="/about">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-info nav-link" href="/products">PRODUCTS</a>
                    </li>
                </ul>

		      <div class="d-flex flex-column p-2">
     			    <form class="form-inline my-2">
            		<input class="form-control mr-sm-2" type="text" placeholder="Search">
            		<button class="btn btn-sm btn-outline-info my-2 my-sm-0" type="submit">Search</button>
     			    </form>
    		  </div>
          
    		  <ul class="navbar-nav p-3">
              @if(Auth::check())
                <li class="nav-item " style="margin-left: 300px;">
                  <a class="text-info nav-link" href="/cart">CART</a>
                  <span class="badge"> {{ Session::has('cart') ? Session::get('cart')->totalQuant : ' ' }} </span>
                </li>
                <li class="nav-item">
                  <a class="text-info nav-link disabled" href="">PROFILE</a>
                </li>
                <li class="nav-item">
                  <a class="text-info nav-link" href="/logout">LOG OUT </a>
                </li>
              @else
              <li class="nav-item">
                  <a class="text-info nav-link" id="loginButton" style="margin-left:350px;"> LOGIN </a>
              </li>
              <form class="form-inline my-2" action="login" method="POST" id="loginForm" style="display:none;">
                {{ csrf_field() }}
                <input class="form-control mr-sm-2" type="text" placeholder="Email" name="email">
                <input class="form-control mr-sm-2" type="password" placeholder="Password" name="password"> 
                <button class="btn btn-sm btn-outline-info" type="submit">Log In </button>
                <a class="nav-item" id="loginClose" style="margin-left: 5px; color:white;">X</a>
              </form>
              <li class="nav-item">
                  <a class="text-info nav-link" href="/register" id="registerButton"> REGISTER </a>
              </li>
              @endif
    			</ul>
  			</div>
  </div>
</div>
</nav>
<script type="text/javascript" charset="utf-8">
    $('#loginButton').click(function(){
        $('#loginForm').show();
        $('#loginButton').hide();
        $('#registerButton').hide();
    });
    $('#loginClose').click(function(){
        $('#loginButton').show();
        $('#registerButton').show();
        $('#loginForm').hide();
    });
</script>