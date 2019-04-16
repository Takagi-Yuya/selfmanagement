@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>プロフィール/編集</h2>
      <br>
      <form action="{{ action("Admin\ProfileController@update") }}" method="post" enctype="multipart/form-data">
        @include('partials.errors.form_errors')
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="name"><span class="badge badge-danger">必須</span>名前：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="name" value="{{ $profile_form->name }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="goal">目標：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="goal" value="{{ $profile_form->goal }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2 ws-nr" for="introduction"><span class="badge badge-danger">必須</span>自己紹介：</label>
          <div class="col-md-10">
            <textarea class="form-control" name="introduction" rows="20">{{ $profile_form->introduction }}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="image">画像：</label>
          <div class="col-md-10">
            <input type="file" class="form-control-file" name="image">
            <div class="form-text text-info">
              設定中：{{ $profile_form->image_path}}
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
            <input type="hidden" name="user_id" value="{{ $profile_form->user_id }}">
            @csrf
            <input class="btn btn-primary" type="submit" value="更新">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
