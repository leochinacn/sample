@extends('layouts.default')
@section('title','更新个人资料')
@section('content')
  <div class="col-md-offset-2 col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>更新个人资料</h5>
      </div>
      <div class="panel-body">
        @include('share._error')
        <div class="gravatar_edit"><a href="http://gravatar.com/emails" target=_blank><img src="{{$user->gravatar('200')}}" alt="{{$user->name}}"></a></div>
        <form action="{{route('users.update',$user->id)}}">
          {{method_field('PATH')}}
          {{csrf_field()}}
          <div class="form-group"><label for="name">名称：</label><input type="text" class="form-control" value="{{$user->name}}" name="name"></div>
          <div class="form-group"><label for="">邮箱：</label><input type="text" value="{{$user->email}}" disabled class="form-control" name="email"></div>
          <div class="form-group"><label for="">密码：</label><input type="password" class="form-control" name="password" value="{{old('password')}}"></div>
          <div class="form-group"><label for="">确认密码：</label><input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control"></div>
          <button type="submit" class="btn btn-primary">更新</button>
        </form>
      </div>
    </div>
  </div>
@endsection
