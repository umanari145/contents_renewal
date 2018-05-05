@extends('pc.admins.layout')

@section('content')
  {!! Form::open(['route'=> 'member@create', 'method' => 'post']) !!}
  {!! Form::token() !!}

  @include('pc.member.contents')

  {!! Form::submit('登録する', ['class'=>'btn btn-primary']) !!}
  {!! Form::close()!!}
</form>

<div id="app">
  <hello></hello>
  <hello name="Laravel"></hello>
</div>
<script src="{{asset('pc/js/app.js')}}" ></script>
@endsection
