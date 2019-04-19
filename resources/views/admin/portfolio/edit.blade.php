@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>自分グラフ/編集</h2>
      <br>
      <form action="{{ action("Admin\PortfolioController@update") }}" method="post" enctype="multipart/form-data">
        @include('partials.errors.form_errors')
        <br>
        <p>※スキル項目欄には自分の出来る事もしくはこれから習得したいスキルを入力</p>
        <p>※数値入力欄には10段階評価として数字を入力</p>
        <br>
        <div class="form-group row">
          <label class="col-md-6 ws-nr" for="item_a">スキル項目A<span class="badge badge-danger">必須</span></label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_a" value="{{ $portfolio_form->item_a }}">
          </div>
          <label class="col-md-6 ws-nr" for="value_before_a">現在の数値を1~10で設定<span class="badge badge-danger">必須</span></label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_before_a'])
          <label class="col-md-6 ws-nr" for="value_after_a">目標とする数値を1~10で設定<span class="badge badge-danger">必須</span></label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_after_a'])
        </div>
        <hr>
        <div class="form-group row">
          <label class="col-md-6 ws-nr" for="item_b">スキル項目B<span class="badge badge-danger">必須</span></label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_b" value="{{ $portfolio_form->item_b }}">
          </div>
          <label class="col-md-6 ws-nr" for="value_before_b">現在の数値を1~10で設定<span class="badge badge-danger">必須</span></label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_before_b'])
          <label class="col-md-6 ws-nr" for="value_after_b">目標とする数値を1~10で設定<span class="badge badge-danger">必須</span></label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_after_b'])
        </div>
        <hr>
        <div class="form-group row">
          <label class="col-md-6 ws-nr" for="item_c">スキル項目C<span class="badge badge-danger">必須</span></label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_c" value="{{ $portfolio_form->item_c }}">
          </div>
          <label class="col-md-6 ws-nr" for="value_before_c">現在の数値を1~10で設定<span class="badge badge-danger">必須</span></label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_before_c'])
          <label class="col-md-6 ws-nr" for="value_after_c">目標とする数値を1~10で設定<span class="badge badge-danger">必須</span></label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_after_c'])
        </div>
        <hr>
        <div class="form-group row">
          <label class="col-md-6" for="item_d">スキル項目D</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_d" value="{{ $portfolio_form->item_d }}">
          </div>
          <label class="col-md-6" for="value_before_d">現在の数値を1~10で設定</label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_before_d'])
          <label class="col-md-6" for="value_after_d">目標とする数値を1~10で設定</label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_after_d'])
        </div>
        <hr>
        <div class="form-group row">
          <label class="col-md-6" for="item_e">スキル項目E</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_e" value="{{ $portfolio_form->item_e }}">
          </div>
          <label class="col-md-6" for="value_before_e">現在の数値を1~10で設定</label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_before_e'])
          <label class="col-md-6" for="value_after_e">目標とする数値を1~10で設定</label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_after_e'])
        </div>
        <hr>
        <div class="form-group row">
          <label class="col-md-6" for="item_f">スキル項目F</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_f" value="{{ $portfolio_form->item_f }}">
          </div>
          <label class="col-md-6" for="value_before_f">現在の数値を1~10で設定</label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_before_f'])
          <label class="col-md-6" for="value_after_f">目標とする数値を1~10で設定</label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_after_f'])
        </div>
        <hr>
        <div class="form-group row">
          <label class="col-md-6" for="item_g">スキル項目G</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_g" value="{{ $portfolio_form->item_g }}">
          </div>
          <label class="col-md-6" for="value_before_g">現在の数値を1~10で設定</label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_before_g'])
          <label class="col-md-6" for="value_after_g">目標とする数値を1~10で設定</label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_after_g'])
        </div>
        <hr>
        <div class="form-group row">
          <label class="col-md-6" for="item_h">スキル項目H</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_h" value="{{ $portfolio_form->item_h }}">
          </div>
          <label class="col-md-6" for="value_before_h">現在の数値を1~10で設定</label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_before_h'])
          <label class="col-md-6" for="value_after_h">目標とする数値を1~10で設定</label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_after_h'])
        </div>
        <hr>
        <div class="form-group row">
          <label class="col-md-6" for="item_i">スキル項目I</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_i" value="{{ $portfolio_form->item_i }}">
          </div>
          <label class="col-md-6" for="value_before_i">現在の数値を1~10で設定</label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_before_i'])
          <label class="col-md-6" for="value_after_i">目標とする数値を1~10で設定</label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_after_i'])
        </div>
        <hr>
        <div class="form-group row">
          <label class="col-md-6" for="item_j">スキル項目J</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="item_j" value="{{ $portfolio_form->item_j }}">
          </div>
          <label class="col-md-6" for="value_before_j">現在の数値を1~10で設定</label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_before_j'])
          <label class="col-md-6" for="value_after_j">目標とする数値を1~10で設定</label>
          @include ('partials.portfolios.form_edit', ['value' => 'value_after_j'])
        </div>
        <hr>
        <div class="form-group row">
          <div class="col-md-10 text-right">
            <input type="hidden" name="user_id" value="{{ $portfolio_form->user_id }}">
            @csrf
            <input class="btn btn-primary" type="submit" value="更新">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
