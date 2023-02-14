@extends('layouts.app')
 
@section('title', 'dashboard page')
 

 
@section('content')

<h1 class="h3 mb-4 text-gray-800">dashboard Page</h1>

<table id="table_id" class="display">
    <thead>
        <tr>
            <th>#</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($logs as $log)
            <tr>
                <td></td>
                <td>{{ $log->action }}</td>
            </tr>
    @endforeach
    </tbody>
</table>



@endsection