@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>日記　編集</h2>
      <br>
      <form action="{{ action("Admin\DiaryController@update") }}" method="post" enctype="multipart/form-data">
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
            <input class="form-control" type="text" name="title" value="{{ $diary_form->title }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="body"><span class="badge badge-danger">必須</span>内容：</label>
          <div class="col-md-10">
            <textarea class="form-control" name="body" rows="20">{{ $diary_form->body }}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="image">画像：</label>
          <div class="col-md-10">
            <input type="file" class="form-control-file" name="image">
            <div class="form-text text-info">
              設定中：{{ $diary_form->image_path}}
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="remove" value="true">
                  ※画像を削除
              </label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-10 text-right">
            <input type="hidden" name="id" value="{{ $diary_form->id }}">
            @csrf
            <input class="btn btn-primary" type="submit" value="更新">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
