@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>プロフィール</h2>
      <br>
      @if ($profile != null)
        <div class="row">
          <div class="image col-md-8 mx-auto">
            @if ($profile->image_path != null)
              <img src="{{ asset('storage/image/' . $profile->image_path) }}" alt="" class="image-profile mx-auto">
            @else
              <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-profile mx-auto">
            @endif
          </div>
        </div>
        <div class="row">
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
        </div>
      @else
        <p>プロフィールを作成しよう！</p>
      @endif
      <div class="row">
        <div class="col-md-8 mx-auto text-right">
          @if ($profile == null)
            <a href="{{ action('Admin\ProfileController@add') }}" role='button' class='btn btn-success'>新規作成</a>
          @else
            <a href="{{ action('Admin\ProfileController@edit', ['user_id'=> $profile->user_id]) }}" role='button' class='btn btn-success'>編集</a>
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mx-auto box">
      <p><i class="fa fa-btn fa-user-check"></i> フォロー</p><hr>
      @foreach ($users as $user)
        @if (auth()->user()->isFollowing($user->id))
        <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $user->id])}}">
          <form action="{{action('Admin\OtherUserProfileController@unfollow', ['id' => $user->id])}}" method="POST">
            {{ csrf_field() }}
          @if ($user->profile != null)
            @if ($user->profile->image_path != null)
              <li class="mb-2">
                <img src="{{ asset('storage/image/' . $user->profile->image_path) }}" alt="" class="image-mini mr-2">{{ $user->profile->name }}
                <button type="submit" id="delete-follow-{{ $user->id }}" class="btn btn-danger ml-2">
                  <i class="fa fa-btn fa-trash"></i>Unfollow
                </button>
              </li>
            @else
              <li class="mb-2">
                <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $user->profile->name }}
                <button type="submit" id="delete-follow-{{ $user->id }}" class="btn btn-danger ml-2">
                  <i class="fa fa-btn fa-trash"></i>Unfollow
                </button>
              </li>
            @endif
          @else
            <li class="mb-2">
              <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $user->name }}
              <button type="submit" id="delete-follow-{{ $user->id }}" class="btn btn-danger ml-2">
                <i class="fa fa-btn fa-trash"></i>Unfollow
              </button>
            </li>
          @endif
          </form>
        </a>
        @endif
      @endforeach
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mx-auto box">
      <p><i class="fa fa-btn fa-user-friends"></i> フォロワー</p><hr>
      @foreach ($users as $user)
        @if ($user->isFollowing($auth_user->id))
          <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $user->id])}}">
            @if ($user->profile != null)
              @if ($user->profile->image_path != null)
                <li class="mb-2">
                  <img src="{{ asset('storage/image/' . $user->profile->image_path) }}" alt="" class="image-mini mr-2">{{ $user->profile->name }}
                </li>
              @else
                <li class="mb-2">
                  <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $user->profile->name }}
                </li>
              @endif
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
