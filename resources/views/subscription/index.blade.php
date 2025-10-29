@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="card-title m-0">Subscription</h2>
                <a href="{{ route('subscription.create') }}" class="btn btn-success">
                    <i class="fa fa-plus"></i> Add New Subscription
                </a>
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="text-center">SL.</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Number of Ads</th>
                            <th>Duration</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $key => $subscription)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $subscription->name }}</td>
                                <td>{{ $subscription->price }}</td>
                                <td>{{ $subscription->number_of_ads }}</td>
                                <td>{{ $subscription->duration.' '. $subscription->duration_type }}</td>
                                <td>{{ Str::limit($subscription->description, 80, '...') }}</td>
                                <td>
                                    <label class="switch">
                                        <a href="{{ route('subscription.status.toggle', $subscription->id) }}">
                                            <input type="checkbox" {{ $subscription->status ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </a>
                                    </label>

                                </td>
                                <td class="text-center">
                                    <a href="{{ route('subscription.edit', $subscription->id) }}" class="btn btn-info btn-sm text-white"> 
                                        <i class="fas fa-edit"></i> 
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
