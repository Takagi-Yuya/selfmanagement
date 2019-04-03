@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>他己分析タイムライン/詳細</h2>
      <br>
        <div class="card mb-4">
          <div class="card-header">
            <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $question->user_id])}}">
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
            <p><b>Q.質問：{{ $question->question }}</b></p>
          </div>
          <div class="card-body">
            @if (count($answers) > 0)
              @foreach ($answers as $answer)
                @if ($answer->profile == null)
                  <p class="image">
                    <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $answer->user->name }}
                  </p>
                @else
                  <p class="image">
                    <img src="{{ asset('storage/image/' . $answer->profile->image_path) }}" alt="" class="image-mini mr-2">{{ $answer->profile->name }}
                  </p>
                @endif
                <p>A.回答：{{ $answer->answer }}</p>
                <p>なぜ？：{{ $answer->reason }}</p>
                <div class="col-md-11 text-right">
                  @if ($answer->user_id == $user->id)
                  <a href="{{ action('Admin\OtherAnswerController@edit', ['id' => $answer->id, 'id2' => $question->id]) }}" role='button' class='btn btn-success'>編集</a>
                  <a href="{{ action('Admin\OtherAnswerController@delete', ['id' => $answer->id]) }}" role='button' class='btn btn-danger'>削除</a>
                  @endif
                </div>
                <hr size="3" color="gray">
              @endforeach
            @else
              <p>※まだ回答はありません。</p>
            @endif
            <div class="row">
              <div class="col-md-11 text-right">
                <a href="{{ action('Admin\OtherAnswerController@add', ['id' => $question->id]) }}" role='button' class='btn btn-success'>新規作成</a>
              </div>
            </div>
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
