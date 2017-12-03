<div class="left_area">

	<ul class="tag_area">
	@foreach ($tags as $tag)
		<li class="each_tag">{{$tag->tag}}({{$tag->num}})</lig>
	@endforeach
	</ul>
</div>