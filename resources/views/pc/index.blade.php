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
    				<img src>
    			</div>
				<div class="item_title">{{$item->title}}</div>

				<dl class="item_other_info">
					<dt>登録日</dt><dd>{{$item->created}}</dd>
					<dt>時間</dt><dd>{{$item->volume}}</dd>
					<dt>タグ</dt>
					<dd class="tag_info"></dd>
				</dl>
    		</div>
		@endforeach
		</div>

		{!!$items->render() !!}
	</div>

@endsection
