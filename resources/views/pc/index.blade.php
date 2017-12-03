@extends('pc.common.layout')

@section('styleSheet')
    <link href="{{asset('pc/css/app.css')}}" rel="stylesheet">
@endsection

@section('JS')
	<script type="text/javascript" src="{{asset('pc/js/original.js')}}"></script>
@endsection


@section('content')
	@foreach($items as $item)
    	<p>{{$item->title}}</p>
	@endforeach
@endsection
