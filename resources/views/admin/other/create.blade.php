@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>他己分析/新規作成</h2>
      <br>
      <form action="{{ action("Admin\OtherQuestionController@create") }}" method="post" enctype="multipart/form-data">
        @include('partials.errors.form_errors')
        <div class="form-group row">
          <label class="col-md-2" for="question"><span class="badge badge-danger">必須</span>Q.質問：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="question" value="{{ old("question") }}" placeholder="例）私を動物に例えるなら何？">
          </div>
        </div>
        <p>※ここで作成した質問は”他己分析タイムライン”へ自動的に投稿されます。</p>
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
