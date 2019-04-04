@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>プロフィール</h2>
      <br>
      <div class="row box p-5">
        <div class="image col-md-8 mx-auto">
          @if ($profile != null)
            @if ($profile->image_path != null)
              <img src="{{ asset('storage/image/' . $profile->image_path) }}" alt="" class="image-profile mx-auto">
            @else
              <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-profile mx-auto">
            @endif
          @else
            <div class="image col-md-8 mx-auto">
              <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-profile mx-auto">
            </div>
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
</div>
@endsection
