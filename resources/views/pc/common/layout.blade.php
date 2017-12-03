<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>@if(isset($head_title)){{$head_title}} | @endif{{ $common_title or ''}}</title>

	@yield('styleSheet')
	@yield('JS')

</head>
<body>
	@include('pc.common.header')
	@yield('content')
	@include('pc.common.sidebar')
	@include('pc.common.footer')
</body>
</html>


