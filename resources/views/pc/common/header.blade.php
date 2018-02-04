<header class="header_area">
	<div class="header_logo">
		<h1>
			<a href="{{ route('Home')}}">
				JK-Collection
			</a>
		</h1>
	</div>
	<input type="hidden" name="basic_url" id="basic_url" value="{{env('APP_URL')}}">
	<nav class="right_area">
		<form action="{{route('Home')}}" method="GET">
		<ul>
			<li>
				<input type="text" name="s[search_word]" placeholder="検索" class="search_area">
				<i class="fa fa-search" aria-hidden="true"></i>
			</li>
			<li><a href="{{route('Home','s[is_fav]=true')}}">お気に入り</li>
			<li>閲覧履歴</li>
		</ul>
		</form>
	</nav>
</header>
