<!doctype html>
<html lang="en">
	<head>
	<title>@yield('title')</title>
 		@include('partials._head')		
  	</head>
<body>
 @include('partials._nav')
 @include('partials._vnav')
 @yield('content')
 @include('partials._footer') 
</body>
</html>