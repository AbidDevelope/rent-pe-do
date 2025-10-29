@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="w-100">
                            <h2 class="float-left">Customer Details</h2>
                            <div class="text-right">
                                <a class="btn btn-light" href="{{ url()->previous() }}"> Back </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Details</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $customer->user->first_name ? $customer->user->name : 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Profile Photo</th>
                                        <td>
                                            <img width="80" src="{{ $customer->user->thumbnail }}"
                                                alt="{{ $customer->user->name }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            {{ $customer->user->email }}
                                            @if ($customer->user->email_verified_at)
                                                <span
                                                    class="badge badge-success">{{ $customer->user->email_verified_at->format('M d, Y') }}</span>
                                            @else
                                                <span class="badge badge-warning">Unverified</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Mobile</th>
                                        <td>
                                            {{ $customer->user->phone }}
                                            @if ($customer->user->phone_verified_at)
                                                <span class="badge badge-success">Verified</span>
                                            @else
                                                <span class="badge badge-warning">Unverified</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Additional Mobile</th>
                                        <td>{{ $customer->user->additional_phone ? $customer->user->additional_phone : 'N/A' }}
                                        </td>
                                    </tr>


                                    @if (!$customer->rents->isEmpty())
                                        <tr>
                                            <th>Rents</th>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#staticBackdrop">
                                                    Show all Rents
                                                </button>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-secondary">
                                <h3 class="modal-title">All Rents</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th class="text-center">View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customer->rents as $key =>$rent)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td class="p-2">{{ $rent->title }}</td>
                                                <td class="p-2">{{ $rent->type }}</td>
                                                <td class="p-2 text-center">
                                                    <a href="{{ route('rent.details',$rent->id) }}" class="btn btn-info py-2">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer bg-secondary py-2">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
