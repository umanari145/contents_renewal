@extends('pc.common.layout')

@section('styleSheet')
    <link href="{{asset('pc/css/list.css')}}" rel="stylesheet">
@endsection

@section('JS')
	<script type="text/javascript" src="{{asset('pc/js/original.js')}}"></script>
@endsection


@section('content')
	<div class="item_area_block">

		<div class="item_area">
		@foreach($items as $item)
    		<div class="single_item">
    			<div class="item_img">
    				<img src="http://jk-collection.net/img/{{$item->original_id}}.jpg">
    			</div>
				<div class="item_title">{{$item->title}}</div>

				<table class="item_other_info">
					<tr>
						<th>登録日</th><td>{{$item->created}}</td>
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
									<li>{{$tag->tag}}</li>
								@endforeach
							@endif
							</ul>
						</td>
					</tr>
				</table>
    		</div>
		@endforeach
		</div>
		{!!$items->render() !!}
	</div>

@endsection
