@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>他己分析タイムライン</h2>
      <br>
        @foreach ($questions as $question)
          <div class="card mb-4">
            <div class="card-header">
              @if ($question->profile == null)
                <p class="image">
                  <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $question->user->name }}さんの質門
                </p>
              @else
                <p class="image">
                  <img src="{{ asset('storage/image/' . $question->profile->image_path) }}" alt="" class="image-mini mr-2">{{ $question->profile->name }}さんの質問
                </p>
              @endif
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
                  <i class="far fa-comment"></i> {{ $question->other_answers->count() }}
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
    {{ $questions->links() }}
  </div>
</div>
@endsection
