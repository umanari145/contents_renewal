<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>@if(isset($head_title)){{$head_title}} | @endif{{ $common_title or ''}}</title>
	<link href="{{asset('pc/css/common.css')}}" rel="stylesheet">

	@yield('styleSheet')
	@yield('JS')

</head>
<body>
	@include('pc.common.header')

	<div class="wrapper">
		@include('pc.common.sidebar')
		@yield('content')
	</div>
	@include('pc.common.footer')
</body>
</html>


