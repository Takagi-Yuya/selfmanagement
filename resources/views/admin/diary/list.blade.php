@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>diary list</h2>
      <br>
        @if (count($diaries) > 0)
          @foreach ($diaries as $diary)
            <div class="row border border-secondary p-3 mb-5">
              <div class="col-md-12">
                <p><small>{{ $diary->created_at->format('Y年m月d日') }}</small></p>
                <div class="image col-md-12 mx-auto">
                  @if ($diary->image_path)
                    <img src="{{ asset('storage/image/' . $diary->image_path) }}" alt="" class="image-diary">
                  @endif
                </div>
                <hr size="3" color="gray">
                <p>タイトル：{{ $diary->title }}</p>
                <hr size="3" color="gray">
                <p>内容：{{ $diary->body }}</p>
                <hr size="3" color="gray">
                <div class="col-md-11 text-right">
                  <a href="{{ action('Admin\DiaryController@edit', ['id' => $diary->id]) }}" role='button' class='btn btn-success'>編集</a>
                  <a href="{{ action('Admin\DiaryController@delete', ['id' => $diary->id]) }}" role='button' class='btn btn-danger'>削除</a>
                </div>
              </div>
            </div>
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
  <div class="d-flex justify-content-center">
    {{ $diaries->links() }}
  </div>
</div>
@endsection
