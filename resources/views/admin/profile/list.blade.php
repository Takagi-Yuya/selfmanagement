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

<!--follow check...-->
    <div class="row">
      <div class="col-md-10 text-left mx-auto box">
      @foreach ($users as $user)

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
                <i class="fa fa-btn fa-user"></i>Follow
            </button>
        </form>
@endif

        @if ($user->profile != null)
          @if ($user->profile->image_path != null)
            <img src="{{ asset('storage/image/' . $user->profile->image_path) }}" alt="" class="image-mini">
          @else
            <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini">
          @endif
          <p>{{ $user->profile->name }}</p>
        @else
          <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-mini">
          <p>{{ $user->name }}</p>
        @endif
      @endforeach
      </div>
    </div>

    </div>
  </div>
</div>
@endsection
