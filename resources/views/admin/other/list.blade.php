@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>他己分析/一覧</h2>
      <br>
        @if (count($questions) > 0)
          @foreach ($questions as $question)
            <div class="row box p-4 mb-4">
              <div class="col-md-12">
                <p><small>{{ $question->updated_at->format('Y年m月d日') }}</small></p>
                <p><b>Q.質問：{{ $question->question }}</b></p>
                <hr size="3" color="gray">
                @if (count($question->other_answers) > 0)
                  @foreach ($question->other_answers as $other_answer)
                    <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $other_answer->user_id])}}">
                    @if ($other_answer->profile == null)
                      <p class="image">
                        <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $other_answer->user->name }}
                      </p>
                    @else
                      @if ($other_answer->profile['image_path'] == null)
                        <p class="image">
                          <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $other_answer->profile->name }}
                        </p>
                      @else
                        <p class="image">
                          <img src="{{ asset('storage/image/' . $other_answer->profile->image_path) }}" alt="" class="image-mini mr-2">{{ $other_answer->profile->name }}
                        </p>
                      @endif
                    @endif
                    </a>
                    <p>A.回答：{{ $other_answer->answer }}</p>
                    <p>なぜ？：{{ $other_answer->reason }}</p>
                    <hr size="3" color="gray">
                  @endforeach
                @else
                  <p>※まだ回答はありません。</p>
                  <p>※回答が無い間は編集可能です。</p>
                @endif
                  <div class="col-md-11 text-right">
                    @if (count($question->other_answers) > 0)
                      <a href="{{ action('Admin\OtherQuestionController@delete', ['id' => $question->id]) }}" role='button' class='btn btn-danger'>全ての項目を削除</a>
                    @else
                      <a href="{{ action('Admin\OtherQuestionController@edit', ['id' => $question->id]) }}" role='button' class='btn btn-success'>編集</a>
                      <a href="{{ action('Admin\OtherQuestionController@delete', ['id' => $question->id]) }}" role='button' class='btn btn-danger'>削除</a>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          @else
            <h4><i class="far fa-thumbs-up"></i>他己分析をはじめよう！</h4>
          @endif
          <br>
          <div class="row">
            <div class="col-md-11 text-right">
              <a href="{{ action('Admin\OtherQuestionController@add') }}" role='button' class='btn btn-success'>新規作成</a>
            </div>
          </div>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    {{ $questions->links() }}
  </div>
</div>
@endsection
