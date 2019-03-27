@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>analysis create</h2>
      <br>
      <div class="row">
        <div class="col-md-12">
          <p>{{ $question->profile->name }}さんの質問</p>
          <p><b>Q.質問：{{ $question->question }}</b></p>
          <hr size="3" color="gray">
        </div>
      </div>
      <form action="{{ action("Admin\OtherAnswerController@create") }}" method="post" enctype="multipart/form-data">
        @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
            @endforeach
          </ul>
        @endif
        <div class="form-group row">
          <label class="col-md-2" for="answer">A.回答：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="answer" value="{{ old("answer") }}" placeholder="{{ $question->profile->name }}さんへ回答をしてみよう">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="reason">理由：</label>
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
