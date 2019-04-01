@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>portfolio create</h2>
      <br>
      <form action="{{ action("Admin\PortfolioController@create") }}" method="post" enctype="multipart/form-data">
        @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
            @endforeach
          </ul>
        @endif
        <p>現在の自分ポートフォリオ作成</p>
        <br>
        <p>・スキル項目欄には自分の出来る事もしくはこれから習得したいスキルを入力</p>
        <p>・数値入力欄には1~10の数字を入力</p>
        <br>
        <div class="form-group row">
          <label class="col-md-2" for="item_a">スキル項目A（※入力必須）</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_a" value="{{ old("item_a") }}">
          </div>
          <label class="col-md-2" for="value_before_a">現在の数値を1~10で設定（※入力必須）</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_before_a" value="{{ old("value_before_a") }}">
          </div>
          <label class="col-md-2" for="value_after_a">目標とする数値を1~10で設定（※入力必須）</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_after_a" value="{{ old("value_after_a") }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="item_b">スキル項目B（※入力必須）</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_b" value="{{ old("item_a") }}">
          </div>
          <label class="col-md-2" for="value_before_b">現在の数値を1~10で設定（※入力必須）</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_before_b" value="{{ old("value_before_b") }}">
          </div>
          <label class="col-md-2" for="value_after_b">目標とする数値を1~10で設定（※入力必須）</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_after_b" value="{{ old("value_after_b") }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="item_c">スキル項目C（※入力必須）</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_c" value="{{ old("item_a") }}">
          </div>
          <label class="col-md-2" for="value_before_c">現在の数値を1~10で設定（※入力必須）</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_before_c" value="{{ old("value_before_c") }}">
          </div>
          <label class="col-md-2" for="value_after_c">目標とする数値を1~10で設定（※入力必須）</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_after_c" value="{{ old("value_after_c") }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="item_d">スキル項目D</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_d" value="{{ old("item_a") }}">
          </div>
          <label class="col-md-2" for="value_before_d">現在の数値を1~10で設定</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_before_d" value="{{ old("value_before_d") }}">
          </div>
          <label class="col-md-2" for="value_after_d">目標とする数値を1~10で設定</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_after_d" value="{{ old("value_after_d") }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="item_e">スキル項目E</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_e" value="{{ old("item_a") }}">
          </div>
          <label class="col-md-2" for="value_before_e">現在の数値を1~10で設定</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_before_e" value="{{ old("value_before_e") }}">
          </div>
          <label class="col-md-2" for="value_after_e">目標とする数値を1~10で設定</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_after_e" value="{{ old("value_after_e") }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="item_f">スキル項目F</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_f" value="{{ old("item_a") }}">
          </div>
          <label class="col-md-2" for="value_before_f">現在の数値を1~10で設定</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_before_f" value="{{ old("value_before_f") }}">
          </div>
          <label class="col-md-2" for="value_after_f">目標とする数値を1~10で設定</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_after_f" value="{{ old("value_after_f") }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="item_g">スキル項目G</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_g" value="{{ old("item_a") }}">
          </div>
          <label class="col-md-2" for="value_before_g">現在の数値を1~10で設定</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_before_g" value="{{ old("value_before_g") }}">
          </div>
          <label class="col-md-2" for="value_after_g">目標とする数値を1~10で設定</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_after_g" value="{{ old("value_after_g") }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="item_h">スキル項目H</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_h" value="{{ old("item_a") }}">
          </div>
          <label class="col-md-2" for="value_before_h">現在の数値を1~10で設定</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_before_h" value="{{ old("value_before_h") }}">
          </div>
          <label class="col-md-2" for="value_after_h">目標とする数値を1~10で設定</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_after_h" value="{{ old("value_after_h") }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="item_i">スキル項目I</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_i" value="{{ old("item_a") }}">
          </div>
          <label class="col-md-2" for="value_before_i">現在の数値を1~10で設定</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_before_i" value="{{ old("value_before_i") }}">
          </div>
          <label class="col-md-2" for="value_after_i">目標とする数値を1~10で設定</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_after_i" value="{{ old("value_after_i") }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="item_j">スキル項目J</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_j" value="{{ old("item_a") }}">
          </div>
          <label class="col-md-2" for="value_before_j">現在の数値を1~10で設定</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_before_j" value="{{ old("value_before_j") }}">
          </div>
          <label class="col-md-2" for="value_after_j">目標とする数値を1~10で設定</label>
          <div class="col-md-10">
            <input class="form-control" type="number" name="value_after_j" value="{{ old("value_after_j") }}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-10 text-right">
            @csrf
            <input class="btn btn-primary" type="submit" value="完了">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
