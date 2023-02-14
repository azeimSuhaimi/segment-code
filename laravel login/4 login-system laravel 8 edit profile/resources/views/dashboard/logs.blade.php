@extends('layouts.app')
 
@section('title', 'roles page')
 

 
@section('content')

<div class="card">
    <h5 class="card-header">users logs</h5>
    <div class="card-body">
      <h5 class="card-title">list users log </h5>

            @foreach ($logs as $log)
                <p>{{ $log->action }}</p>
            @endforeach



    </div>
  </div>

@endsection