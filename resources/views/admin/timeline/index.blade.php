@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>timeline</h2>
      <br>
        @foreach ($questions as $question)
          <div class="card mb-4">
            <div class="card-header">
              {{ $question->user_id }}さんの質問
            </div>
            <div class="card-body">
              <p class="card-text">
                {{ $question->question }}
              </p>
            </div>
            <div class="card-footer">
              <span class="mr-4">
                投稿日時 <small>{{ $question->created_at->format('Y年m月d日') }}</small>
              </span>
              @if ($question->other_answers->count() != 0)
                <a href="{{ action('Admin\OtherAnswerController@show', ['id' => $question->id]) }}">
                <span class="badge badge-primary">
                  コメント {{ $question->other_answers->count() }}件
                </span>
                </a>
              @endif
            </div>
          </div>
        @endforeach
    </div>
  </div>
</div>
@endsection
