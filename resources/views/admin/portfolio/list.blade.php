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
        <canvas id="nowChart" height="250"></canvas>
        <script>
          var ctx = document.getElementById("nowChart").getContext("2d");
          var myBar = new Chart(ctx, {
              type: 'bar',                           //◆棒グラフ
              data: {                                //◆データ
                  labels: ["{{$portfolio->item_a}}", "{{$portfolio->item_b}}", "{{$portfolio->item_c}}", "{{$portfolio->item_d}}", "{{$portfolio->item_e}}", "{{$portfolio->item_f}}", "{{$portfolio->item_g}}", "{{$portfolio->item_h}}", "{{$portfolio->item_i}}", "{{$portfolio->item_j}}"],
                  datasets: [{                       //データ設定
                      data: [{{$portfolio->value_before_a}}, {{$portfolio->value_before_b}}, {{$portfolio->value_before_c}}, {{$portfolio->value_before_d}}, {{$portfolio->value_before_e}}, {{$portfolio->value_before_f}}, {{$portfolio->value_before_g}}, {{$portfolio->value_before_h}}, {{$portfolio->value_before_i}}, {{$portfolio->value_before_j}}],
                      backgroundColor: ['red', 'blue', 'green', 'yellow', 'pink', 'orange','skyblue', 'purple', 'lightgreen', 'silver']   //背景色
                  }]
              },
              options: {                             //◆オプション
                  responsive: true,                  //グラフ自動設定
                  legend: {                          //凡例設定
                      display: false                 //表示設定
                 },
                  title: {                           //タイトル設定
                      display: true,                 //表示設定
                      fontSize: 30,                  //フォントサイズ
                      text: '現在のポートフォリオ'                //ラベル
                  },
                  scales: {                          //軸設定
                      yAxes: [{                      //y軸設定
                          display: true,             //表示設定
                          scaleLabel: {              //軸ラベル設定
                             display: true,          //表示設定
                             labelString: '10ステップ',  //ラベル
                             fontSize: 15               //フォントサイズ
                          },
                          ticks: {                      //最大値最小値設定
                              min: 0,                   //最小値
                              max: 10,                  //最大値
                              fontSize: 15,             //フォントサイズ
                              stepSize: 1               //軸間隔
                          },
                      }],
                      xAxes: [{                         //x軸設定
                          display: true,                //表示設定
                          barPercentage: 0.4,           //棒グラフ幅
                          categoryPercentage: 0.4,      //棒グラフ幅
                          scaleLabel: {                 //軸ラベル設定
                             display: true             //表示設定
                          },
                          ticks: {
                              fontSize: 15             //フォントサイズ
                          },
                      }],
                  },
                  layout: {                             //レイアウト
                      padding: {                          //余白設定
                          left: 50,
                          right: 50,
                          top: 0,
                          bottom: 0
                      }
                  }
              }
          });
        </script>
        <br>
        <hr>
        <br>
        <canvas id="futureChart" height="250"></canvas>
        <script>
        var ctx = document.getElementById("futureChart").getContext("2d");
        var myBar = new Chart(ctx, {
            type: 'bar',                           //◆棒グラフ
            data: {                                //◆データ
                labels: ["{{$portfolio->item_a}}", "{{$portfolio->item_b}}", "{{$portfolio->item_c}}", "{{$portfolio->item_d}}", "{{$portfolio->item_e}}", "{{$portfolio->item_f}}", "{{$portfolio->item_g}}", "{{$portfolio->item_h}}", "{{$portfolio->item_i}}", "{{$portfolio->item_j}}"],
                datasets: [{                       //データ設定
                    data: [{{$portfolio->value_after_a}}, {{$portfolio->value_after_b}}, {{$portfolio->value_after_c}}, {{$portfolio->value_after_d}}, {{$portfolio->value_after_e}}, {{$portfolio->value_after_f}}, {{$portfolio->value_after_g}}, {{$portfolio->value_after_h}}, {{$portfolio->value_after_i}}, {{$portfolio->value_after_j}}],
                    backgroundColor: ['red', 'blue', 'green', 'yellow', 'pink', 'orange','skyblue', 'purple', 'lightgreen', 'silver']   //背景色
                }]
            },
            options: {                             //◆オプション
                responsive: true,                  //グラフ自動設定
                legend: {                          //凡例設定
                    display: false                 //表示設定
               },
                title: {                           //タイトル設定
                    display: true,                 //表示設定
                    fontSize: 30,                  //フォントサイズ
                    text: '目標のポートフォリオ'                //ラベル
                },
                scales: {                          //軸設定
                    yAxes: [{                      //y軸設定
                        display: true,             //表示設定
                        scaleLabel: {              //軸ラベル設定
                           display: true,          //表示設定
                           labelString: '10ステップ',  //ラベル
                           fontSize: 15               //フォントサイズ
                        },
                        ticks: {                      //最大値最小値設定
                            min: 0,                   //最小値
                            max: 10,                  //最大値
                            fontSize: 15,             //フォントサイズ
                            stepSize: 1               //軸間隔
                        },
                    }],
                    xAxes: [{                         //x軸設定
                        display: true,                //表示設定
                        barPercentage: 0.4,           //棒グラフ幅
                        categoryPercentage: 0.4,      //棒グラフ幅
                        scaleLabel: {                 //軸ラベル設定
                           display: true             //表示設定
                        },
                        ticks: {
                            fontSize: 15             //フォントサイズ
                        },
                    }],
                },
                layout: {                             //レイアウト
                    padding: {                          //余白設定
                        left: 50,
                        right: 50,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        });
      </script>
      <div class="row">
        <div class="col-md-10 text-right">
          <a href="{{ action('Admin\PortfolioController@edit', ['user_id' => $portfolio->user_id]) }}" role='button' class='btn btn-success'>編集</a>
        </div>
      </div>
      @else
        <p>”現在の自分”→”目標とする未来の自分”　2つのポートフォリオを作成しよう！</p>
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
