<!DOCTYPE html>
<html>
<head>
	<title>TodoList In Laravel</title>
	<meta charset="utf-8">
    <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/todo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript"  src="/js/todo.js"></script>
</head>
<body>

@if(Session::has('flash_message'))
     <div class="alert alert-success {{Session::has('flash_message_important') ? 'alert-important' : ''}}">
      @if(Session::has('flash_message_important'))
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     @endif
     {{ session('flash_message') }}
     </div>
@endif
@if(Session::has('flash_message1'))
    <div class="alert alert-danger {{Session::has('flash_message_important') ? 'alert-important' : ''}}">
    @if(Session::has('flash_message_important'))
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    @endif
    {{ session('flash_message1') }}
    </div>
@endif
@if(Session::has('flash_message2'))
    <div class="alert alert-danger {{Session::has('flash_message_important') ? 'alert-important' : ''}}">
    @if(Session::has('flash_message_important'))
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    @endif
    {{ session('flash_message2') }}
    </div>
@endif

    <div>@yield('top')</div>
    <div class='nav'>@yield('content')</div>
    <div>@yield('form')</div>
    <div class='show'>@yield('show')</div>
    <!-- <div class='c'>@yield('grid')</div>     -->
    <div class='help'>@yield('help')</div>
    

</body>

</html>