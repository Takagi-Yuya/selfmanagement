@extends ('layouts.portfolio')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 mx-auto">
      <h2>ポートフォリオ/現在・未来</h2>
      <br>
      @if ($portfolio != null)
        <p><i class="far fa-check-circle"></i>スキルアップ出来たと感じたらポートフォリオを更新しよう！</p>
        <p><i class="far fa-check-circle"></i>新たな目標が出来たらポートフォリオに項目を追加しよう！</p>
        <br>
        @include ('partials.portfolios.now_chart')
        <br>
        <hr>
        <br>
        @include ('partials.portfolios.future_chart')
      <div class="row">
        <div class="col-md-10 text-right">
          <a href="{{ action('Admin\PortfolioController@edit', ['user_id' => $portfolio->user_id]) }}" role='button' class='btn btn-success'>編集</a>
        </div>
      </div>
      @else
        <h4><i class="far fa-thumbs-up"></i>”現在の自分”→”目標とする未来の自分”　2つのポートフォリオを作成しよう！</h4>
        <div class="row">
          <div class="col-md-10 text-right">
            <a href="{{ action('Admin\PortfolioController@add') }}" role='button' class='btn btn-success'>新規作成</a>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection
