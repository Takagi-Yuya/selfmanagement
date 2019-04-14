@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>プロフィール</h2>
      <br>
      <div class="row box p-5">
        <div class="image col-md-8 mx-auto">
          @if ($profile != null && $profile->image_path != null)
              <img src="{{ $profile->image_path }}" alt="" class="image-profile mx-auto">
          @elseif ($profile != null && $profile->image_path == null)
              <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-profile mx-auto">
          @else
              <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-profile mx-auto">
          @endif
        </div>
        <div class="col-md-8 mx-auto mt-3">
          @if (auth()->user()->isFollowing($user->id))
            <form action="{{action('Admin\OtherUserProfileController@unfollow', ['id' => $user->id])}}" method="POST">
              {{ csrf_field() }}
              <button type="submit" id="delete-follow-{{ $user->id }}" class="btn btn-danger">
                <i class="fa fa-btn fa-trash"></i>Unfollow
              </button>
            </form>
          @else
            <form action="{{action('Admin\OtherUserProfileController@follow', ['id' => $user->id])}}" method="POST">
              {{ csrf_field() }}
              <button type="submit" id="follow-user-{{ $user->id }}" class="btn btn-success">
                <i class="fa fa-btn fa-user-plus"></i>Follow
              </button>
            </form>
          @endif
        </div>
        <div class="col-md-8 mx-auto">
          @if ($profile != null)
            <br>
            <hr size="3" color="gray">
            <p>名前：{{ $profile->name }}</p>
            <hr size="3" color="gray">
            <p>目標：{{ $profile->goal }}</p>
            <hr size="3" color="gray">
            <p>自己紹介：{{ $profile->introduction }}</p>
            <hr size="3" color="gray">
          @else
            <br>
            <hr size="3" color="gray">
            <p>名前：{{ $user->name }}</p>
            <hr size="3" color="gray">
            <p>※詳細プロフィールの設定はまだありません。</p>
            <hr size="3" color="gray">
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 ml-auto box">
      <p><i class="fa fa-btn fa-user-check"></i> フォロー {{ $follow_count }}</p><hr>
      @foreach ($other_users as $other_user)
        @if ($user->isFollowing($other_user->id) && $other_user->id == auth()->user()->id)
          <a href="{{ action('Admin\ProfileController@list', ['id' => $other_user->id])}}">
            @if ($other_user->profile != null && $other_user->profile->image_path != null)
              <li class="mb-2">
                <img src="{{ $other_user->profile->image_path }}" alt="" class="image-mini mr-2">{{ $other_user->profile->name }}
              </li>
            @elseif ($other_user->profile != null && $other_user->profile->image_path == null)
              <li class="mb-2">
                <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $other_user->profile->name }}
              </li>
            @else
              <li class="mb-2">
                <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $other_user->name }}
              </li>
            @endif
          </a>
        @elseif ($user->isFollowing($other_user->id) && $other_user->id != auth()->user()->id)
          <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $other_user->id])}}">
            @if ($other_user->profile != null && $other_user->profile->image_path != null)
              <li class="mb-2">
                <img src="{{ $other_user->profile->image_path }}" alt="" class="image-mini mr-2">{{ $other_user->profile->name }}
              </li>
            @elseif ($other_user->profile != null && $other_user->profile->image_path == null)
              <li class="mb-2">
                <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $other_user->profile->name }}
              </li>
            @else
              <li class="mb-2">
                <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $other_user->name }}
              </li>
            @endif
          </a>
        @endif
      @endforeach
    </div>
    <div class="col-md-4 mr-auto box">
      <p><i class="fa fa-btn fa-user-friends"></i> フォロワー {{ $follower_count }}</p><hr>
      @foreach ($other_users as $other_user)
        @if ($other_user->isFollowing($user->id) && $other_user->id == auth()->user()->id)
          <a href="{{ action('Admin\ProfileController@list', ['id' => $other_user->id])}}">
            @if ($other_user->profile != null && $other_user->profile->image_path != null)
              <li class="mb-2">
                <img src="{{ $other_user->profile->image_path }}" alt="" class="image-mini mr-2">{{ $other_user->profile->name }}
              </li>
            @elseif ($other_user->profile != null && $other_user->profile->image_path == null)
              <li class="mb-2">
                <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $other_user->profile->name }}
              </li>
            @else
              <li class="mb-2">
                <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $other_user->name }}
              </li>
            @endif
          </a>
        @elseif ($other_user->isFollowing($user->id) && $other_user->id != auth()->user()->id)
          <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $other_user->id])}}">
            @if ($other_user->profile != null && $other_user->profile->image_path != null)
              <li class="mb-2">
                <img src="{{ $other_user->profile->image_path }}" alt="" class="image-mini mr-2">{{ $other_user->profile->name }}
              </li>
            @elseif ($other_user->profile != null && $other_user->profile->image_path == null)
              <li class="mb-2">
                <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $other_user->profile->name }}
              </li>
            @else
              <li class="mb-2">
                <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini mr-2">{{ $other_user->name }}
              </li>
            @endif
          </a>
        @endif
      @endforeach
    </div>
  </div>
</div>
@endsection
