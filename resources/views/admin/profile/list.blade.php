@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>your profile</h2>
      <br>
      @if ($profile != null)
        <div>
          @if ($profile->image_path != null)
            <img src="{{ asset('storage/image/' . $profile->image_path) }}" alt="">
          @endif
        </div>
        <div>名前:{{ $profile->name }}</div>
        <div>目標:{{ $profile->goal }}</div>
        <div>自己紹介:{{ $profile->introduction }}</div>
        <br>
      @else
        <div>プロフィールを作成しよう！</div>
        <br>
      @endif
      <div class="col-md-4 mx-auto">
        @if ($profile == null)
          <a href="{{ action('Admin\ProfileController@add') }}" role='button' class='btn btn-primary'>新規作成</a>
        @else
          <a href="{{ action('Admin\ProfileController@edit', ['user_id'=> $profile->user_id]) }}" role='button' class='btn btn-primary'>編集</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
