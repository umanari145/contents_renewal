@extends('pc.admins.layout')


@section('content')
<form action="{{route('item@create')}}" method="POST">
  <div class="form-group">
    {!! Form::open(['route' => 'item@create', 'method' => 'get']) !!}
    {{ csrf_field() }}
  </div>

  {{Form::label('name', '名前')}}
  <?php echo $data['name']; ?>
  {{Form::text('title', $data['name'])}}
  <input type="name2" value="<?php echo $data['name2']; ?>">
  <div>
    <?php $checked = (isset($data['sex']) && $data['sex'] === '1'); ?>
    {{Form::radio('sex', '1', $checked,['id'=>'man'])}}
    {{Form::label('man', '男性')}}

    <?php $checked = (isset($data['sex']) && $data['sex'] === '2'); ?>
    {{Form::radio('sex', '2', $checked, ['id'=>'woman'])}}
    {{Form::label('woman', '女性')}}
  </div>

  <div>
    <?php $checked = (isset($data['option']) && in_array('1', $data['option']));?>
    {!! Form::checkbox('option[]', 1, $checked ,['id'=> 'option1']) !!}
    {!! Form::label('option1', '選択肢1') !!}

    <?php $checked = (isset($data['option']) && in_array('2', $data['option']));?>
    {!! Form::checkbox('option[]', 2, $checked ,['id'=> 'option2']) !!}
    {!! Form::label('option2', '選択肢2') !!}
  </div>


  <div>
    {!! Form::submit('登録する', ['class'=>'btn btn-primary']) !!}
    {!! Form::close()!!}
  </div>

</form>
@endsection
