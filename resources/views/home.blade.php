@extends('layouts.portfolio')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 mx-auto">
      <div>
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
      </div>
      <h1 class="head_test">
        セルマネへ<br>ようこそ
        <span class="head_test-point p-2">自分を見える化して目標へコミットしよう</span>
      </h1>
    </div>
  </div>

  <div class="row p-5">
  @if ($user->profile != null)
    <div class="balloon1 col-md-4 mb-5 mr-auto">
      <div class="icon"><h1><i class="fas fa-user-astronaut"></i><h1></div>
      Hello~!　{{ $user->profile->name }}<br>今日は{{ $today->format('Y年m月d日') }}です!
    </div>
    <div class="image col-md-8 mx-auto">
      @if ($user->profile->image_path != null)
        <img src="{{ asset('storage/image/' . $user->profile->image_path) }}" alt="" class="image-profile mx-auto">
      @else
        <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-profile mx-auto">
      @endif
    </div>
    <div class="col-md-8 mx-auto">
      <br>
      <hr size="3" color="gray">
      <p>名前：{{ $user->profile->name }}</p>
      <hr size="3" color="gray">
      <p>目標：{{ $user->profile->goal }}</p>
      <hr size="3" color="gray">
      <p>自己紹介：{{ $user->profile->introduction }}</p>
      <hr size="3" color="gray">
    </div>
  @else
    <div class="balloon1 col-md-4 mb-5 mr-auto">
      <div class="icon"><h1><i class="fas fa-user-astronaut"></i></h1></div>
      Hello~!　{{ $user->name }}<br>今日は{{ $today->format('Y年m月d日') }}です!
    </div>
    <div class="image col-md-8 mx-auto">
        <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-profile mx-auto">
    </div>
    <div class="col-md-8 mx-auto">
      <br>
      <hr size="3" color="gray">
      <p>名前：{{ $user->name }}</p>
      <hr size="3" color="gray">
      <p>※詳細プロフィールの設定はまだありません。</p>
      <hr size="3" color="gray">
    </div>
  @endif
  </div>

  <div class="row">
    @if ($portfolio != null)
      <hr>
      <br>
      <div class="col-md-6 mx-auto">
        @include ('partials.portfolios.now_chart')
      </div>
      <div class="col-md-6 mx-auto">
        @include ('partials.portfolios.future_chart')
      </div>
    @endif
  </div>

  <hr>
  <div class="row">
    <div class="col-md-10 mx-auto text-center">
      <a href="{{ action('Admin\ProfileController@list') }}" class="border_slide_btn m-4">Profile</a>
      <a href="{{ action('Admin\AnalysisController@list') }}" class="border_slide_btn m-4">Self Analysis</a>
      <a href="{{ action('Admin\OtherQuestionController@list') }}" class="border_slide_btn m-4">Other Self Analysis</a>
      <a href="{{ action('Admin\OtherQuestionController@index') }}" class="border_slide_btn m-4">Timeline</a>
      <a href="{{ action('Admin\DiaryController@list') }}" class="border_slide_btn m-4">Diary</a>
      <a href="{{ action('Admin\PortfolioController@list') }}" class="border_slide_btn m-4">Portfolio</a>
      <a href="{{ url('/about') }}" class="border_slide_btn m-4">About</a>
    </div>
  </div>
  <hr>
  </div>
</div>
@endsection
