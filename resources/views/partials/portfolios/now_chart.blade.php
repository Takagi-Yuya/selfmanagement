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
              text: '現在の自分グラフ'                //ラベル
          },
          scales: {                          //軸設定
              yAxes: [{                      //y軸設定
                  display: true,             //表示設定
                  scaleLabel: {              //軸ラベル設定
                     display: true,          //表示設定
                     labelString: '10段階評価',  //ラベル
                     fontSize: 15               //フォントサイズ
                  },
                  ticks: {                      //最大値最小値設定
                      min: 0,                   //最小値
                      max: 10,                  //最大値
                      fontSize: 12,             //フォントサイズ
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
                      fontSize: 12             //フォントサイズ
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
