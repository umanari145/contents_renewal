@extends('pc.admins.layout')

@section('content')
  {!! Form::open(['route'=> 'member@create', 'method' => 'post']) !!}
  {!! Form::token() !!}

  <div class="form-group">
    @include('pc.common.form',['field'=>'name'])
  </div>

  <div class="form-group">
    @include('pc.common.form',['field'=>'furigana'])
  </div>

  <div class="form-group">
    @include('pc.common.form',['field'=>'email'])
  </div>

  <div class="form-group">
    @include('pc.common.form',['type'=>'radio', 'field'=>'sex'])
  </div>

  <div class="form-group">
    @include('pc.common.form',['field'=>'birthday'])
  </div>


  <div class="form-group">
    @include('pc.common.form',['type'=>'select', 'field'=>'area'])
  </div>

  <div class="form-group">
    @include('pc.common.form',['type'=>'checkbox', 'field'=>'traffic'])
  </div>

  {!! Form::submit('登録する', ['class'=>'btn btn-primary']) !!}
  {!! Form::close()!!}
</form>
@endsection
