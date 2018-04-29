@extends('pc.admins.layout')

@section('content')
<form action="{{route('itemRegist',$item->id)}}" method="POST">
  <div class="form-group">
    <label for="item_id" class="control-label">ID</label>
    <span>{{$item->id}}</span>
  </div>
  <div class="form-group">
    {!! Form::open(['route' => ['itemRegist', $item->id], 'method' => 'get']) !!}
    {!! Form::token() !!}
    {!! Form::label('item_title','タイトル', ['class'=>'control-label']) !!}
    {!! Form::text('title', $item->title,['id'=> 'item_title','class'=>'form-control']) !!}
    @if(isset($errors) && $errors->has('title'))
    <span class="label label-danger">
      {{$errors->first('title')}}
    </span>
    @endif
  </div>
  <div class="form-group">
    {!! Form::label('movie_url','URL', ['class'=>'control-label']) !!}
    {!! Form::text('movie_url', $item->movie_url,['id'=> 'movie_url','class'=>'form-control']) !!}
    @if(isset($errors) && $errors->has('movie_url'))
    <span class="label label-danger">
      {{$errors->first('movie_url')}}
    </span>
    @endif
  </div>
  <div class="form-group">
    <p>タグ</p>
    @foreach($tags as $tag_label => $tag_id)
    <div class="checkbox-inline">
      <?php $has_tag = in_array($tag_id, $item->tag_arr) ?>
      {!! Form::checkbox('tag[]',$tag_id, $has_tag ,['id'=> 'select_' . $tag_id]) !!}
      {!! Form::label('select_' . $tag_id , $tag_label, ['class'=>'control-label']) !!}
    </div>
    @endforeach
  </div>
  {!! Form::submit('登録する', ['class'=>'btn btn-primary']) !!}
  {!! Form::close()!!}

</form>
@endsection
