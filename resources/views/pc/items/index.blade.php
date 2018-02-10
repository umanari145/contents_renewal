@extends('pc.common.layout')

@section('styleSheet')
    <link href="{{asset('pc/css/item.css')}}" rel="stylesheet">
@endsection

@section('JS')
	<script type="text/javascript" src="{{asset('pc/js/original.js')}}"></script>
@endsection


@section('content')
	<div class="item_area_block">
    <div class="search_word_area">
      @if($search_word)
        {{$search_word}}:{{$items->total()}}件
      @elseif($is_fav)
        お気に入り:{{$items->total()}}件
      @elseif($is_history)
        閲覧履歴:{{count($items)}}件
      @endif
    </div>
		<div class="item_area">
		@foreach($items as $item)
    		<div class="single_item">
    			<div class="item_img">
    				<a href="{{env('APP_URL')}}/items/view/{{$item->id}}">
    					<img src="http://jk-collection.net/img/{{$item->original_id}}.jpg" class="list_img">
    				</a>
    			</div>
				<div class="item_title">
					<a href="{{env('APP_URL')}}/items/view/{{$item->id}}">{{$item->title}}</a>
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
		@endforeach
		</div>
    @if ($has_paginate)
		{!!$items->render() !!}
    @endif
	</div>

@endsection
