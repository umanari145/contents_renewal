@extends('pc.admins.layout')

@section('content')
  {!! Form::open(['route'=> ['member@edit', $data['mem_id']], 'method' => 'post']) !!}
  {!! Form::token() !!}

  {!! Form::hidden('mem_id', $data['mem_id'])!!}
  @include('pc.member.contents')


  {!! Form::submit('登録する', ['class'=>'btn btn-primary']) !!}
  {!! Form::close()!!}
</form>
@endsection
