@extends('layouts.app')
 
@section('title', 'roles page')
 

 
@section('content')

<div class="card">
    <h5 class="card-header">edit users role</h5>
    <div class="card-body">
      <h5 class="card-title">list users</h5>

            @foreach ($users as $user)
                <form action="/roles" method="post">
                    @csrf
                    <p>{{ $user->name }}</p>
                    <p>{{ $user->email }}</p>
                    <input type="hidden" name="email" value="{{ $user->email }}">

                    @foreach ($roles as $role)

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $role->access }}" name="role[]" {{ in_array($role->access, explode(',', $user->access)) ? 'checked' : '' }}>
                            <label class="form-check-label" >
                                {{ $role->permission }}
                            </label>
                        </div>
        
                    @endforeach

                    <button type="submit" class="btn btn-primary">edit</button>
                </form>
            @endforeach



    </div>
  </div>

@endsection