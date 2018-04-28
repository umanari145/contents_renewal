@extends('pc.admins.layout')

@section('content')
  {!! Form::open(['method' => 'post']) !!}
  {!! Form::token() !!}

  <div class="form-group">
    @include('pc.common.form',['field'=>'name', 'label' => '名前'])
  </div>

  <div class="form-group">
    @include('pc.common.form',['type'=>'radio', 'field'=>'sex'])
  </div>

  <div class="form-group">
    @include('pc.common.form',['type'=>'select', 'field'=>'area', 'label' => '地域'])
  </div>

  <div class="form-group">
    @include('pc.common.form',['type'=>'checkbox', 'field'=>'area'])
  </div>


  {!! Form::submit('登録する', ['class'=>'btn btn-primary']) !!}
  {!! Form::close()!!}
</form>
@endsection
