<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">Home Page</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <div class="row">
    <div class="col-md-5">
        <ul class="nav navbar-nav">
            <li>
                <div class="dropdown">
                  <a class="dropbtn">Services</a>
                  <div class="dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                  </div>
                </div>
            </li>
            <li>
                <div class="dropdown">
                  <a class="dropbtn">Categories</a>
                  <div class="dropdown-content">
                    <a href="#">Link 4</a>
                    <a href="#">Link 5</a>
                    <a href="#">Link 6</a>
                  </div>
                </div>
            </li>
            <li>
                <form action="" class="search" role="search">
                        <div class="input-group">
                            <input type="text" name="term" id="term" class="form-control" placeholder="Search for item">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </span>
                        </div>
                </form>
            </li>
        </ul>
        </div>   
        <div class="col-md-5">
        <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="{{ route('product.shoppingCart') }}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Shopping Cart <span class="badge"> {{Session::has('cart') ? Session::get('cart')->totalQty : '' }} </span> </a>
        </li>
        <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Account Management <span class="caret"></span></a>
            <ul class="dropdown-menu">
                       
            @if (Auth::guard("admin_user")->user())
                <li><a href="{{url('/admin_home')}}">Profile</a></li>
                <li><a href="{{url('/admin_logout')}}">Logout</a></li>
            @elseif(! Auth::guest())
                <li><a href="{{ route('profile') }} ">Profile</a></li>
                <li><a href="{{ route('logout') }} ">Logout</a></li>
                {{-- <li role="separator" class="divider"></li> --}}
            @else
                
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @endif
             </ul>
            </li>
        </ul>
        </div>
    </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>