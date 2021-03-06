<header class="header_area">
	<div class="header_logo">
		<h1>
			<a href="{{ route('Home')}}">
				{{env('SITE_TITLE')}}
			</a>
		</h1>
	</div>
	<input type="hidden" name="basic_url" id="basic_url" value="{{env('APP_URL')}}">
	<nav class="right_area">
		{!! Form::open(['route' => 'Home', 'method' => 'get']) !!}
		<ul>
			<li>
				<input type="text" name="s[search_word]" placeholder="検索" class="search_area">
				<i class="fa fa-search" aria-hidden="true"></i>
			</li>
			<li><a href="{{route('Home','s[is_fav]=true')}}">お気に入り</li>
			<li><a href="{{route('Home','s[is_history]=true')}}">閲覧履歴</li>
		</ul>
		 {!! Form::close() !!}
	</nav>
</header>
