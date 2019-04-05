@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>他己分析タイムライン</h2>
        <div class="row">
          <div class="col-md-3 mt-5 mb-3">
            <form action="{{ action('Admin\SearchController@search') }}" method="get" class="form-inline">
              <div class="form-group">
                <input type="text" name="keyword" placeholder="キーワードを入力">
                <input type="submit" value="検索" >
              </div>
            </form>
          </div>
        </div>
      @foreach ($questions as $question)
        <div class="card mb-4">
          <div class="card-header">
            @if ($question->user_id == $user->id)
              <a href="{{ action('Admin\ProfileController@list') }}">
            @else
              <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $question->user_id])}}">
            @endif
            @if ($question->profile == null)
              <p class="image">
                <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $question->user->name }}
              </p>
            @else
              @if ($question->profile['image_path'] == null)
                <p class="image">
                  <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $question->profile->name }}
                </p>
              @else
                <p class="image">
                  <img src="{{ asset('storage/image/' . $question->profile->image_path) }}" alt="" class="image-mini mr-2">{{ $question->profile->name }}
                </p>
              @endif
            @endif
              </a>
          </div>
          <div class="card-body">
            <p class="card-text">
              <a href="{{ action('Admin\OtherAnswerController@show', ['id' => $question->id]) }}">
                <b>Q.質問：{{ $question->question }}</b>
              </a>
            </p>
          </div>
          <div class="card-footer">
            <span class="mr-5">
              <small>{{ $question->created_at->format('Y年m月d日') }}</small>
            </span>
            @if ($question->other_answers->count() != 0)
              <span>
                <a href="{{ action('Admin\OtherAnswerController@show', ['id' => $question->id]) }}">
                  <i class="far fa-comment"></i> {{ $question->other_answers->count() }}
                </a>
              </span>
            @else
            <span>
              <i class="far fa-comment"></i> 0
            </span>
            @endif
          </div>
        </div>
      @endforeach
    </div>
  </div>
  <div class="d-flex justify-content-center">
    {{ $questions->appends(Request::all())->links() }}
  </div>
</div>
@endsection
