@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>自己分析/編集</h2>
      <br>
      <form action="{{ action("Admin\AnalysisController@update") }}" method="post" enctype="multipart/form-data">
        @include('partials.errors.form_errors')
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="question"><span class="badge badge-danger">必須</span>Q.質問：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="question" value="{{ $analysis_form->question }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="answer"><span class="badge badge-danger">必須</span>A.回答：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="answer" value="{{ $analysis_form->answer }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="reason"><span class="badge badge-danger">必須</span>理由：</label>
          <div class="col-md-10">
            <textarea class="form-control" rows="5" name="reason">{{ $analysis_form->reason }}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-10 text-right">
            <input type="hidden" name="id" value="{{ $analysis_form->id }}">
            @csrf
            <input class="btn btn-primary" type="submit" value="更新">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
