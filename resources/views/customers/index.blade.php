@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="m-0">All Customers</h2>
                            </div>
                            <div class="col-6">
                                <form action="{{ route('customer') }}" method="GET">
                                    <div class="row justify-content-end">
                                        <div class="col-6 pr-1">
                                            <input type="text" name='search' placeholder="Search"
                                                value="{{ request('search') }}" class="form-control"/>
                                        </div>
                                        <div class="col-3 pl-1">
                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-responsive-sm" id="myTable">
                                <thead class="bg-secondary">
                                    <tr>
                                        <th scope="col">Sl.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $key =>$customer)
                                        <tr>
                                            <td class="text-center">{{ $key+1 }}</td>
                                            <td>{{ $customer->user->name }}</td>
                                            <td>
                                                {{ $customer->user->email }}
                                            </td>
                                            <td>
                                                {{ $customer->user->phone }}
                                            </td>
                                            <td>
                                                <a href="{{ route('customer.show', $customer->id) }}" class="btn btn-primary py-1 px-2">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
