@extends ('layouts.portfolio')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 mx-auto">
      <h2>profile create</h2>
      <br>
        <canvas id="nowChart"></canvas>
        <script>
          var ctx = document.getElementById("nowChart").getContext("2d");
          var myBar = new Chart(ctx, {
              type: 'bar',                           //◆棒グラフ
              data: {                                //◆データ
                  labels: ['A','B','C','D','E','F','G','H','I','J'],     //ラベル名
                  datasets: [{                       //データ設定
                      data: [4,3,2,3,1,2,2,1,0,0],          //データ内容
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
                             fontSize: 18               //フォントサイズ
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
                             display: true,             //表示設定
                             labelString: '項目',  //ラベル
                             fontSize: 18               //フォントサイズ
                          },
                          ticks: {
                              fontSize: 18             //フォントサイズ
                          },
                      }],
                  },
                  layout: {                             //レイアウト
                      padding: {                          //余白設定
                          left: 100,
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
            <a href="{{ action('Admin\PortfolioController@add') }}" role='button' class='btn btn-success'>新規作成</a>
          </div>
        </div>
        <br>
        <hr>
        <br>
        <canvas id="futureChart"></canvas>
        <script>
        var ctx = document.getElementById("futureChart").getContext("2d");
        var myBar = new Chart(ctx, {
            type: 'bar',                           //◆棒グラフ
            data: {                                //◆データ
                labels: ['A','B','C','D','E','F','G','H','I','J'],     //ラベル名
                datasets: [{                       //データ設定
                    data: [5,8,9,6,6,4,3,6,8,10],          //データ内容
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
                           fontSize: 18               //フォントサイズ
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
                           display: true,             //表示設定
                           labelString: '項目',  //ラベル
                           fontSize: 18               //フォントサイズ
                        },
                        ticks: {
                            fontSize: 18             //フォントサイズ
                        },
                    }],
                },
                layout: {                             //レイアウト
                    padding: {                          //余白設定
                        left: 100,
                        right: 50,
                        top: 0,
                        bottom: 0
                    }
                }
            }
        });
      </script>
    </div>
  </div>
</div>
@endsection
