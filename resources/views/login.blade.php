@extends('layouts.page')
@section('content')
<div class="row align-items-center justify-content-center" style="margin-top:50px">
<form action="{{url('/')}}/checkLogin" method="post" class="form">
    {{csrf_field()}}
<div class="card border-primary mb-3" style="width: 300px;">
  <div class="card-header">Login</div>
  <div class="card-body">
    <div class="form-group">
        <label class="col-form-label" for="email">Username</label>
        <input class="form-control" type="text" placeholder="Email Address" id="email" name="email">
    
        <label class="col-form-label" for="password">Password</label>
        <input class="form-control" type="password"  id="password" name="password">
    </div>
    @if($message=Session::get('error') || count($errors))
        <div class="alert alert-danger alert-block" style="margin-top: 20px">
            <strong>Error</strong>
        </div>
    @endif
    <input type="submit" id="submit" class="input input-submit">
  </div>
</div>
</form>
</div>
@endsection