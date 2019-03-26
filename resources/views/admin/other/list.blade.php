@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>other list</h2>
      <br>
        @if (count($questions) > 0)
          @foreach ($questions as $question)
          <hr size="3" color="gray">
            <div class="row">
              <div class="col-md-12">
                <p><small>{{ $question->updated_at->format('Y年m月d日') }}</small></p>
                <p><b>Q.質問：{{ $question->question }}</b></p>
                @if (count($question->other_answers) > 0)
                  @foreach ($question->other_answers as $other_answer)
                  <p>A.回答：{{ $other_answer->answer }}</p>
                  <p>なぜ？：{{ $other_answer->reason }}</p>
                  @endforeach
                @else
                  <p>※まだ回答はありません。</p>
                @endif
                  <div class="col-md-11 text-right">
                    <a href="{{ action('Admin\OtherQuestionController@edit', ['id' => $question->id]) }}" role='button' class='btn btn-success'>質問の編集</a>
                    <a href="{{ action('Admin\OtherQuestionController@delete', ['id' => $question->id]) }}" role='button' class='btn btn-danger'>全て削除</a>
                  </div>
                </div>
              </div>
              <hr size="3" color="gray">
            @endforeach
          @else
            <p>他己分析をはじめよう！</p>
          @endif
          <br>
          <div class="row">
            <div class="col-md-11 text-right">
              <a href="{{ action('Admin\OtherQuestionController@add') }}" role='button' class='btn btn-success'>新規作成</a>
            </div>
          </div>
    </div>
  </div>
</div>
@endsection
