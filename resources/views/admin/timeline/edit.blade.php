@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>他己分析回答/編集</h2>
      <br>
      <div class="row">
        <div class="col-md-12">
          <a href="{{ action('Admin\OtherUserProfileController@show', ['id' => $question->user_id])}}">
          @if ($question->profile == null)
            <p class="image">
              <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $question->user->name }}
            </p>
          @else
            @if ($question->profile['image_path'] == null)
              <p class="image">
                <img src="{{asset('images/noprofileimage.jpg')}}" alt="" class="image-mini mr-2">{{ $question->profile->name }}
              </p>
            @else
              <p class="image">
                <img src="{{ $question->profile->image_path }}" alt="" class="image-mini mr-2">{{ $question->profile->name }}
              </p>
            @endif
          @endif
          </a>
          <p><b>Q.質問：{{ $question->question }}</b></p>
          <hr size="3" color="gray">
        </div>
      </div>
      <form action="{{ action("Admin\OtherAnswerController@update") }}" method="post" enctype="multipart/form-data">
        @include('partials.errors.form_errors')
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="answer"><span class="badge badge-danger">必須</span>A.回答：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="answer" value="{{ $answer_form->answer }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="reason"><span class="badge badge-danger">必須</span>理由：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="reason" value="{{ $answer_form->reason }}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-10 text-right">
            <input type="hidden" name="id" value="{{ $answer_form->id }}">
            @csrf
            <input class="btn btn-primary" type="submit" value="更新">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
