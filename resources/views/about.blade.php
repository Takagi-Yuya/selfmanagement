@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>About セルマネ</h2>
      <br>
      <div class="row">
        <div class="col-md-10">
          <p><font size="5">『セルマネ』</font><font size="4">というサービスは、目標へコミットしたいと本気で考えている、もしくは頭のどこかでは考えている、大小様々な目標を持つ全ての人向けの、自分を見える化する自己管理サービスです。</font></p>
          <p><font size="4">自己分析・他己分析、さらに自分ポートフォリオを作成する事で、大小様々な目標に対しての現在地を確認でき、就職・転職に特化した他社の自己分析サービスとは違い、利用者を限定せず全ての人が生活の一部として利用できます。</font></p>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>How to セルマネ</h2>
      <br>
      <div class="row">
        <div class="col-md-10">
          <ul>
            <li class="p-3"><h4><i class="far fa-id-card"></i> 自己分析</h4>
              <font size="4">自分への質問を作成し、自らが回答と理由を作成できます。皆さんご存知の自己分析です。</font>
            </li>
            <li class="p-3"><h4><i class="fas fa-id-card"></i> 他己分析</h4>
              <font size="4">自分についての質問を作成できます。回答と理由はあなた以外が作成します。自己分析だけでは見えない自分が見えてくるかもしれません。</font>
            </li>
            <li class="p-3"><h4><i class="fa fa-sort-amount-up"></i> 他己分析タイムライン</h4>
              <font size="4">上記で作成した自分についての質問(他己分析質問)は、そのまま他己分析タイムラインに投稿されます。投稿を見た他のユーザーからの回答を待つと共に、自らも他のユーザーの質問に回答をしてあげて下さい。</font>
            </li>
            <li class="p-3"><h4><i class="fa fa-chart-bar"></i> ポートフォリオ</h4>
              <font size="4">視覚的に自らの事を理解する為に、ここでは自分ポートフォリオが作成できます。現状の自分と目標とする自分、2つの棒グラフが作成出来るので日々確認と更新を行って行きましょう。可視化する事は目標達成のモチベーションにも繋がります。</font>
            </li>
            <li class="p-3"><h4><i class="fa fa-btn fa-user-friends"></i> フォロー＆フォロワー</h4>
              <font size="4">他のユーザーをフォローする事が出来ます。</font>
            </li>
            <li class="p-3"><h4><i class="fa fa-pencil-alt"></i> 日記</h4>
              <font size="4">日々の記録を写真付きで作成する事ができます。短文でもいいので出来るだけ毎日書くのがポイントです。</font>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
