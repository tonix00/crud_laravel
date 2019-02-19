@extends('layouts.page')

@section('content')
    @if($message = Session::get('success'))
    <div class="alert alert-success" style="margin-top: 20px">
        {{$message}}
    </div>
    @endif
    <a href="{{url('/')}}/post"><button type="button" class="btn btn-primary">Add</button></a>
    <br />
    <table class="table">
      <thead class="thead">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Created</th>
          <th scope="col">Updated</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if(count($users)>0)
            @foreach($users as $user)
                <tr>
                  <th scope="row">{{$user->id}}</th>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->created_at}}</td>
                  <td>{{$user->updated_at}}</td>
                  <td>
                    <a href="{{url('/')}}/editable/{{$user->id}}"><button type="button" class="btn btn-primary">Update</button></a>
                    <a href="{{url('/')}}/delete/{{$user->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                  </td>
                </tr>
            @endforeach
        @endif
      </tbody>
    </table>
    {{ $users->links() }}
@endsection