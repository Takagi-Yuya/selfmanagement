@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>プロフィール</h2>
      <br>
      @if ($other_profile != null)
        <div class="image col-md-8 mx-auto">
          @if ($other_profile->image_path != null)
            <img src="{{ asset('storage/image/' . $other_profile->image_path) }}" alt="" class="image-profile">
          @else
            <img src="{{ asset('images/noprofileimage.jpg') }}" alt="" class="image-profile">
          @endif
        </div>
        <br>
        <hr size="3" color="gray">
        <p>名前：{{ $other_profile->name }}</p>
        <hr size="3" color="gray">
        <p>目標：{{ $other_profile->goal }}</p>
        <hr size="3" color="gray">
        <p>自己紹介：{{ $other_profile->introduction }}</p>
        <hr size="3" color="gray">
      @else
        <p>まだプロフィールはありません。</p>
      @endif
    </div>
  </div>
</div>
@endsection
