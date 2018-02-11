@extends('pc.admins.layout')


@section('content')
<div class="row">
<div class="col-lg-8">
<table class="table table-bordered table-striped">
  <tr>
    <th>id</th>
    <th>タイトル</th>
  </tr>
  @foreach($items as $item)
  <tr>
    <th>{{$item->id}}</th>
    <th><a href="{{route('itemRegist',$item->id)}}">{{$item->title}}</th>
  </tr>
  @endforeach
</table>
<div class="mx-auto" style="text-align:center">
{!!$items->render() !!}
</div>
</div>
</div>
@endsection
