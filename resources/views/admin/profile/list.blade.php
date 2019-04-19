@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>プロフィール</h2>
      <br>
      @if ($profile != null)
        <div class="row box p-5">
          <div class="image col-md-8 mx-auto">
            @if ($profile->image_path != null)
              <img src="{{ $profile->image_path }}" alt="" class="image-profile mx-auto">
            @else
              <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-profile mx-auto">
            @endif
          </div>
          <div class="col-md-8 mx-auto">
            <br>
            <hr size="3" color="gray">
            <p>名前：{{ $profile->name }}</p>
            <hr size="3" color="gray">
            <p>目標：{{ $profile->goal }}</p>
            <hr size="3" color="gray">
            <p>自己紹介：{{ $profile->introduction }}</p>
            <hr size="3" color="gray">
          </div>
          <div class="col-md-8 mx-auto text-right">
            <a href="{{ action('Admin\ProfileController@edit', ['user_id'=> $profile->user_id]) }}" role='button' class='btn btn-success'>編集・更新</a>
          </div>
        </div>
      @else
        <h4><i class="far fa-thumbs-up"></i>プロフィールを作成しよう！</h4>
        <div class="row">
          <div class="col-md-8 mx-auto text-right">
            <a href="{{ action('Admin\ProfileController@add') }}" role='button' class='btn btn-success'>新規作成</a>
          </div>
        </div>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 ml-auto box">
      <p><i class="fa fa-btn fa-user-check"></i> フォロー {{$follow_count}}</p><hr>
      @foreach ($users as $user)
        @if ($auth_user->isFollowing($user->id))
          <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $user->id])}}">
            @if ($user->profile != null && $user->profile->image_path != null)
              <li class="mb-2">
                <img src="{{ $user->profile->image_path }}" alt="" class="image-mini mr-2">{{ $user->profile->name }}
              </li>
            @elseif ($user->profile != null && $user->profile->image_path == null)
              <li class="mb-2">
                <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $user->profile->name }}
              </li>
            @else
              <li class="mb-2">
                <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $user->name }}
              </li>
            @endif
          </a>
        @endif
      @endforeach
    </div>
    <div class="col-md-4 mr-auto box">
      <p><i class="fa fa-btn fa-user-friends"></i> フォロワー {{ $follower_count }}</p><hr>
      @foreach ($users as $user)
        @if ($user->isFollowing($auth_user->id))
          <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $user->id])}}">
            @if ($user->profile != null && $user->profile->image_path != null)
              <li class="mb-2">
                <img src="{{ $user->profile->image_path }}" alt="" class="image-mini mr-2">{{ $user->profile->name }}
              </li>
            @elseif ($user->profile != null && $user->profile->image_path == null)
                <li class="mb-2">
                  <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $user->profile->name }}
                </li>
            @else
              <li class="mb-2">
                <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $user->name }}
              </li>
            @endif
          </a>
        @endif
      @endforeach
    </div>
  </div>
</div>
@endsection
