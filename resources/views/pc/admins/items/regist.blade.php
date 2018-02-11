@extends('pc.admins.layout')


@section('content')
<form action="{{route('itemRegist',$item->id)}}" method="POST">
  <div class="form-group">
    <label for="item_id" class="control-label">ID</label>
    <span>{{$item->id}}</span>
  </div>
  <div class="form-group">
    <label for="item_title" class="control-label">タイトル</label>
    <input type="text" id="item_title" class="form-control" value="{{$item->title}}">
  </div>
  <div class="form-group">
    <label for="movie_url" class="control-label">URL</label>
    <input type="text" id="movie_url" class="form-control" value="{{$item->movie_url}}">
  </div>
  <div class="form-group">
    <p>タグ</p>
    @foreach($tags as $tag_label => $tag_id)
    <div class="checkbox-inline">
      <input type="checkbox" id="select_{{$tag_id}}" value="{{$tag_id}}">
      <label for="select_{{$tag_id}}">{{$tag_label}}</lebel>
    </div>
    @endforeach
  </div>
</form>
@endsection
