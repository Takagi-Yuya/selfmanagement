@extends ('layouts.portfolio')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 mx-auto">
      <h2>自分グラフ/現在・未来</h2>
      <br>
      @if ($portfolio != null)
        <p><i class="far fa-check-circle"></i>スキルアップ出来たと感じたら自分グラフを更新しよう！</p>
        <p><i class="far fa-check-circle"></i>新たな目標が出来たら自分グラフに項目を追加しよう！</p>
        <br>
        <div class="row">
          <div class="col-md-10 text-right">
            <a href="{{ action('Admin\PortfolioController@edit', ['user_id' => $portfolio->user_id]) }}" role='button' class='btn btn-success'>編集・更新</a>
          </div>
        </div>
        <br>
        @include ('partials.portfolios.now_chart')
        <br>
        <hr>
        <br>
        @include ('partials.portfolios.future_chart')
      <div class="row">
        <div class="col-md-10 text-right">
          <a href="{{ action('Admin\PortfolioController@edit', ['user_id' => $portfolio->user_id]) }}" role='button' class='btn btn-success'>編集・更新</a>
        </div>
      </div>
      @else
        <h4><i class="far fa-thumbs-up"></i>”現在の自分”→”目標とする未来の自分”　2つの自分グラフを作成しよう！</h4>
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
