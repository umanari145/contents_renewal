<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>{{env('SITE_TITLE')}}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{asset('pc/css/admin/login.css')}}" rel="stylesheet">
	<link href="{{asset('pc/css/font-awesome.css')}}" rel="stylesheet">

	@yield('styleSheet')
	@yield('JS')

</head>
<body>
		@yield('content')
</body>
</html>
