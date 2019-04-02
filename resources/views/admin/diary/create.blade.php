@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>日記/新規作成</h2>
      <br>
      <form action="{{ action("Admin\DiaryController@create") }}" method="post" enctype="multipart/form-data">
        @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
            @endforeach
          </ul>
        @endif
        <div class="form-group row">
          <label class="col-md-2" for="title"><span class="badge badge-danger">必須</span>タイトル：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="title" value="{{ old("title") }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="body"><span class="badge badge-danger">必須</span>内容：</label>
          <div class="col-md-10">
            <textarea class="form-control" name="body" rows="20">{{ old("body") }}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="image">画像：</label>
          <div class="col-md-10">
            <input type="file" class="form-control-file" name="image">
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
