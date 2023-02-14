@extends('layouts.app')
 
@section('title', 'roles page')
 

 
@section('content')



  <table id="table_id" class="display">
    <thead>
        <tr>
            <th>#</th>
            <th>action</th>
            <th>#</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($logs as $log)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $log->action }}</td>
                <td>{{ $log->created_at }}</td>
            </tr>
    @endforeach
    </tbody>
</table>



@endsection