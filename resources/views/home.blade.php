@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">welcome!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ログインに成功しました。
                </div>
                <ul>
                @foreach ($users as $user)
                <li>{{$user->name}}</li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
