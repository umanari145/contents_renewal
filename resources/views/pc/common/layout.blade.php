<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>{{env('SITE_TITLE')}}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link href="{{asset('pc/css/common.css')}}" rel="stylesheet">
	<link href="{{asset('pc/css/font-awesome.css')}}" rel="stylesheet">

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
