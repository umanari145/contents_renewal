<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>@if(isset($head_title)){{$head_title}} | @endif{{ $common_title or ''}}</title>

	@yield('styleSheet')
	@yield('JS')

</head>
<body>

	@yield('content')
	@include('pc.common.sidebar')

</div>
</body>
</html>


