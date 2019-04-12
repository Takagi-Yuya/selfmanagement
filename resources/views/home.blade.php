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
  @if ($user->profile != null)
    <div class="row p-5">
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
    </div>
  @else
    <div class="row p-5">
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
    </div>
  @endif
  <hr>
  <div class="row">
    <div class="col-md-10 mx-auto text-center">
      <a href="#" class="border_slide_btn m-4">Profile</a>
      <a href="#" class="border_slide_btn m-4">Self Analysis</a>
      <a href="#" class="border_slide_btn m-4">Other Self Analysis</a>
      <a href="#" class="border_slide_btn m-4">Timeline</a>
      <a href="#" class="border_slide_btn m-4">Diary</a>
      <a href="#" class="border_slide_btn m-4">Portfolio</a>
      <a href="#" class="border_slide_btn m-4">About</a>
    </div>
  </div>
  <hr>
  </div>
</div>
@endsection
