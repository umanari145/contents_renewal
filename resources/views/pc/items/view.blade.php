@extends('pc.common.layout')

@section('styleSheet')
    <link href="{{asset('pc/css/item.css')}}" rel="stylesheet">
@endsection

@section('JS')
	<script type="text/javascript" src="{{asset('pc/js/original.js')}}"></script>
@endsection


@section('content')
	<div class="detail_area_block">

		<div class="detail_area">
			<div class="detail_item">
			{!! $item->movie_url !!}
			</div>
		</div>

		<table class="item_other_info">
			<tr>
				<th>登録日</th><td>{!! date('Y/m/d', strtotime($item->created)) !!}</td>
			</tr>
			<tr>
				<th>時間</th><td>{{$item->volume}}</td>
			</tr>
			<tr>
				<th class="tag_th">タグ</th>
				<td>
					<ul class="tag_list">
					@if (isset($item->tags_arr))
						@foreach($item->tags_arr as $tag)
							<li><a href="{{env('APP_URL')}}?s[tag]={{$tag->id}}" class="tag_button">{{$tag->tag}}</a></li>
						@endforeach
					@endif
					</ul>
				</td>
			</tr>
		</table>

	</div>

@endsection
