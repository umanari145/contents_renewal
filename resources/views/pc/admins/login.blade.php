@extends('pc.admins.login_layout')


@section('content')
<div class="login_block">
  <div class="form_area">
    {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
    <p class="login_head">ユーザー名とパスワードを<br>入力してください。</p>
    <p><input type="text" name="username" placeholder="ユーザー名"></p>
    <p><input type="password" name="password" placeholder="パスワード"></p>
    <p><input type="submit" name="ログイン" class="login_btn"></p>
    @if ($message)
    <p class="errors">{{$message}}</p>
    @endif
  </div>
</div>
@endsection
