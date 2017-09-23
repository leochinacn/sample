@extends('layouts.default');
@section('title','homepage')

@section('content')
  <div class="jumbotron">
    <h1>Hello Laravel</h1>
    <p class="lead">你现在看到的是<a href="">Laravel入门教程</a></p>
    <p>一切，将从这里开始。</p>
    <p><a href="{{route('sigup')}}" class="btn btn-lg btn-success" role="button">现在注册</a></p>
  </div>
@endsection
