@extends('layouts.toppage')

@section('content')
<div id="aaa">
<div class="container">
  <div class="row text-center flex-center position-ref padding-original">
    <div class="col-md-12">
      <p class="title">セルマネ</p>
      <p class="subtitle">自分を見える化して目標へコミットしよう</p>

    <!--テストユーザー　ショートカットログイン用-->
    @guest
      <div class="pt-5">
        <form method='POST' action="{{ route('login') }}">
          @csrf
          <input id="email" type="hidden" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="#" required autofocus>
          <input id="password" type="hidden" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="#" required>
          <button class="btn-flat-border test">
            <i class="fas fa-check"></i>{{ __(' test user login (ポートフォリオ閲覧用)') }}
          </button>
        </form>
      </div>
      <!--通常表示時　ボタン-->
      <div class="col-md-10 mx-auto">
          <a href="{{ route('login') }}" role='button' class='btn btn-flat-border login'><i class="fas fa-key"></i> ログイン</a>
      @if (Route::has('register'))
          <a  href="{{ route('register') }}" role='button' class='btn btn-flat-border register'><i class="fas fa-user-plus"></i> 新規ユーザー登録</a>
      @endif
      </div>
    @endguest

  </div>
</div>
</div>
@endsection
