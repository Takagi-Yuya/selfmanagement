@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>自己分析/新規作成</h2>
      <br>
      <form action="{{ action("Admin\AnalysisController@create") }}" method="post" enctype="multipart/form-data">
        @include('partials.errors.form_errors')
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="question"><span class="badge badge-danger">必須</span>Q.質問：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="question" value="{{ old("question") }}" placeholder="例）私の子供の頃の夢は？">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="answer"><span class="badge badge-danger">必須</span>A.回答：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="answer" value="{{ old("answer") }}" placeholder="例）建築士になる事。">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="reason"><span class="badge badge-danger">必須</span>理由：</label>
          <div class="col-md-10">
            <textarea class="form-control" rows="5" name="reason" placeholder="例）自分で考えたものを形にできるので楽しそうだから。">{{ old("reason") }}</textarea>
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
