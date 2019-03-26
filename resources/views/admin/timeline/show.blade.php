@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>timeline details</h2>
      <br>
        <div class="card mb-4">
          <div class="card-header">
            <p>{{ $question->user_id }}さんの質問</p>
            <p><b>{{ $question->question }}</b></p>
          </div>
          <div class="card-body">
            @if (count($answers) > 0)
              @foreach ($answers as $answer)
              <p>{{ $answer->user_id }}さんの回答</p>
              <p>A.回答：{{ $answer->answer }}</p>
              <p>なぜ？：{{ $answer->reason }}</p>
              <hr size="3" color="gray">
              @endforeach
            @else
              <p>※まだ回答はありません。</p>
            @endif
          </div>
          <div class="card-footer">
            <span class="mr-4">
              投稿日時 <small>{{ $question->created_at->format('Y年m月d日') }}</small>
            </span>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
