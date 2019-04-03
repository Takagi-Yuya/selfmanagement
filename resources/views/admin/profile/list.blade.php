@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>プロフィール</h2>
      <br>
      @if ($profile != null)
        <div class="image col-md-8 mx-auto">
          @if ($profile->image_path != null)
            <img src="{{ asset('storage/image/' . $profile->image_path) }}" alt="" class="image-profile mx-auto">
          @else
            <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-profile mx-auto">
          @endif
        </div>
        <br>
        <hr size="3" color="gray">
        <p>名前：{{ $profile->name }}</p>
        <hr size="3" color="gray">
        <p>目標：{{ $profile->goal }}</p>
        <hr size="3" color="gray">
        <p>自己紹介：{{ $profile->introduction }}</p>
        <hr size="3" color="gray">
      @else
        <p>プロフィールを作成しよう！</p>
      @endif
      <div class="row">
        <div class="col-md-10 text-right">
          @if ($profile == null)
            <a href="{{ action('Admin\ProfileController@add') }}" role='button' class='btn btn-success'>新規作成</a>
          @else
            <a href="{{ action('Admin\ProfileController@edit', ['user_id'=> $profile->user_id]) }}" role='button' class='btn btn-success'>編集</a>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
