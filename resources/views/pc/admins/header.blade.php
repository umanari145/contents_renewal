<header class="header_area">
	<div class="row">
		<h1 class="col-lg-4">
			<a href="{{ route('Home')}}">
				{{env('SITE_TITLE')}}:管理画面
			</a>
		</h1>
		<div class="col-lg-4" style="margin-top:25px;">
			<p><a href="{{route('logout')}}" class="btn btn-info">ログアウト</a></p>
		</div>
	<input type="hidden" name="basic_url" id="basic_url" value="{{env('APP_URL')}}">
</div>
</header>
