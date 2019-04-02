@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>自己分析/一覧</h2>
      <br>
        @if (count($analyses) > 0)
          @foreach ($analyses as $analysis)
            <div class="row border border-secondary p-4 mb-4">
              <div class="col-md-12">
                <p><small>{{ $analysis->updated_at->format('Y年m月d日') }}</small></p>
                <p><b>Q.質問：{{ $analysis->question }}</b></p>
                <hr size="3" color="gray">
                <p>A.回答：{{ $analysis->answer }}</p>
                <p>なぜ？：{{ $analysis->reason }}</p>
                <div class="col-md-11 text-right">
                  <a href="{{ action('Admin\AnalysisController@edit', ['id' => $analysis->id]) }}" role='button' class='btn btn-success'>編集</a>
                  <a href="{{ action('Admin\AnalysisController@delete', ['id' => $analysis->id]) }}" role='button' class='btn btn-danger'>削除</a>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <p>自己分析をはじめよう！</p>
        @endif
        <br>
        <div class="row">
          <div class="col-md-11 text-right">
            <a href="{{ action('Admin\AnalysisController@add') }}" role='button' class='btn btn-success'>新規作成</a>
          </div>
        </div>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    {{ $analyses->links() }}
  </div>
</div>
@endsection
