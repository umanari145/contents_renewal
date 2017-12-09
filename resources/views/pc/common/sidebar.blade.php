<div class="left_area">

	<ul class="tag_area">
	@foreach ($tags as $tag)
		<li class="each_tag">
			<a href="./?s[tag]={{$tag->id}}">{{$tag->tag}}({{$tag->num}})</a>
		</li>
	@endforeach
	</ul>
</div>