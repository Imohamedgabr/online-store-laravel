<!DOCTYPE html>
<html lang="en">
<head>
@include('partials._head')
<!-- partials has to start with _ and you can use include with it and we made a folder-->
</head>
  <body>
   @include('partials._nav') 
   
          @include('partials._messages')
          
          @yield('content')

    @include('partials._footer') 
    @yield('scripts')
    
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>