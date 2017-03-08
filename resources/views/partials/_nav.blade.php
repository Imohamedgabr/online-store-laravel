    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">Home Page</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>

                    <li>
                    <a href=" {{-- {{ route('product.shoppingCart') }} --}} ">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                     Shopping Cart <span class="badge"> {{-- {{Session::has('cart') ? Session::get('cart')->totalQty : '' }} --}} </span> </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Account Management <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                       
                            {{-- @if (Auth::guard("admin_user")->user()) --}}
                                <li><a href="{{-- {{url('/admin_home')}} --}}">Profile</a></li>
                                <li><a href="{{-- {{url('/admin_logout')}} --}}">Logout</a></li>
                            {{-- @elseif(! Auth::guest()) --}}
                                <li><a href="{{-- {{ route('profile') }} --}} ">Profile</a></li>
                                {{-- <li role="separator" class="divider"></li> --}}
                                <li><a href="{{-- {{ route('logout') }} --}} ">Logout</a></li>
                            {{-- @else --}}
                                
                                <li><a href="{{-- {{ url('/login') }} --}}">Login</a></li>
                                <li><a href="{{-- {{ url('/register') }} --}}">Register</a></li>
                            {{-- @endif --}}


                        </ul>
                    </li>
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>