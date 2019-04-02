@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>自己分析/新規作成</h2>
      <br>
      <form action="{{ action("Admin\AnalysisController@create") }}" method="post" enctype="multipart/form-data">
        @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
            @endforeach
          </ul>
        @endif
        <div class="form-group row">
          <label class="col-md-2" for="question"><span class="badge badge-danger">必須</span>Q.質問：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="question" value="{{ old("question") }}" placeholder="自分へ質問してみよう">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="answer"><span class="badge badge-danger">必須</span>A.回答：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="answer" value="{{ old("answer") }}" placeholder="回答をしてみよう">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="reason"><span class="badge badge-danger">必須</span>理由：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="reason" value="{{ old("reason") }}" placeholder="理由を考えてみよう">
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
