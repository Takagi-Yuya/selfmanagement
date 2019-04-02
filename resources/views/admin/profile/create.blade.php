@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>プロフィール/新規作成</h2>
      <br>
      <form action="{{ action("Admin\ProfileController@create") }}" method="post" enctype="multipart/form-data">
        @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
            @endforeach
          </ul>
        @endif
        <div class="form-group row">
          <label class="col-md-2" for="name"><span class="badge badge-danger">必須</span>名前：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="name" value="{{ old("name") }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="goal">目標：</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="goal" value="{{ old("goal") }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-md-2" for="introduction"><span class="badge badge-danger">必須</span>自己紹介：</label>
          <div class="col-md-10">
            <textarea class="form-control" name="introduction" rows="20">{{ old("introduction") }}</textarea>
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
