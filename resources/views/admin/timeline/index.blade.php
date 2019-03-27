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
              @if ($question->profile == null)
                {{ $question->user->name }}さんの質門
              @else
                {{ $question->profile->name }}さんの質問
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
              <span class="mr-4">
                投稿日時 <small>{{ $question->created_at->format('Y年m月d日') }}</small>
              </span>
              @if ($question->other_answers->count() != 0)
                <span class="badge badge-primary">
                  {{ $question->other_answers->count() }}件の回答があります
                </span>
              @endif
            </div>
          </div>
        @endforeach
    </div>
  </div>
</div>
@endsection
