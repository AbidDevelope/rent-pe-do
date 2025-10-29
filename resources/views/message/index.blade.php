@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title m-0">All Messages</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead class="bg-secondary">
                        <tr>
                            <th>SL.</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>occupation</th>
                            <th>message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $key => $message)
                        <tr> 
                            <td>{{ $key+1}}</td>
                            <td>{{ $message->name}}</td>
                            <td>{{ $message->email}}</td>
                            <td>{{ $message->phone}}</td>
                            <td>{{ $message->occupation}}</td>
                            <td>{{ $message->message}}</td>
                            <td>{{ $message->created_at->format('M d, Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection