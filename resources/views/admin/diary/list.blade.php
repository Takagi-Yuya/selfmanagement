@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>diary list</h2>
      <br>
        @if (count($diaries) > 0)
          @foreach ($diaries as $diary)
          <hr size="3" color="gray">
            <div class="row">
              <div class="col-md-12">
                <p><small>{{ $diary->created_at->format('Y年m月d日') }}</small></p>
                <div class="image col-md-4">
                  @if ($diary->image_path)
                    <img src="{{ asset('storage/image/' . $diary->image_path) }}" alt="">
                  @endif
                </div>
                <p>タイトル：{{ $diary->title }}</p>
                <p>内容：{{ $diary->body }}</p>
                <div class="col-md-11 text-right">
                  <a href="{{ action('Admin\DiaryController@edit', ['id' => $diary->id]) }}" role='button' class='btn btn-success'>編集</a>
                  <a href="{{ action('Admin\DiaryController@delete', ['id' => $diary->id]) }}" role='button' class='btn btn-danger'>削除</a>
                </div>
              </div>
            </div>
            <hr size="3" color="gray">
          @endforeach
        @else
          <p>日記を作成しよう！</p>
        @endif
        <br>
        <div class="row">
          <div class="col-md-11 text-right">
            <a href="{{ action('Admin\DiaryController@add') }}" role='button' class='btn btn-success'>新規作成</a>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
