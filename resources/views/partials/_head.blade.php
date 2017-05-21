

    <meta charset="utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- initial scale is for zooming in and out --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>My Store @yield('title') </title> 
    
    <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Latest compiled and minified font awesome -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Jquery from CDN -->
    <script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>

    <!-- the css files we created in the css folder in public -->
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('js/jquery-autocomplete/jquery-ui.min.css') }}" />
    
    <link rel="stylesheet" href="{{ URL::asset('js/jquery-autocomplete/jquery-ui.theme.css') }}" />

    {!! Html::script('js/jquery-autocomplete/jquery-ui.min.js') !!}

    <script type="text/javascript">
      $(function(){
        $("#term").autocomplete({
          source: "{{ route('product.autocomplete') }}",
          minLength: 3,
          select: function(event,ui){
            $("#term").val(ui.item.value);
          }
        });
      });
    </script>

    @yield('stylesheets')
 

