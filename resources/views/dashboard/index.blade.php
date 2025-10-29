@extends('layouts.app')

@section('content')
    <div class="container-fluid py-3">
        <h3 class="mb-3">Dashboard</h3>

        @php
            $currency = $currency ? $currency->symbol : '$';
        @endphp

        <div class="row">

            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-danger"><i class="fa fa-user"></i></span>
                    <div class="mini-stat-info text-end text-muted">
                        <span class="countfect text-red" data-num="{{ $customer }}"></span>
                        Total Users
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-purple"><i class="fa fa-list"></i></span>
                    <div class="mini-stat-info text-end text-muted">
                        <span class="countfect text-purple" data-num="{{ $rent }}"></span>
                        Total Rents
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-green"><i class="fa fa-list"></i></span>
                    <div class="mini-stat-info text-end text-muted">
                        <span class="countfect text-green" data-num="{{ $activeRent }}"></span>
                        Active Rents
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-info"><i class="fa fa-city"></i></span>
                    <div class="mini-stat-info text-end text-muted">
                        <span class="countfect text-info" data-num="{{ $city }}"></span>
                        Total City
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-orange"><i class="fa fa-map-marked"></i></span>
                    <div class="mini-stat-info text-end text-muted">
                        <span class="countfect text-orange" data-num="{{ $area }}"></span>
                        Total Area
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="mini-stat clearfix bx-shadow">
                    <span class="mini-stat-icon bg-gradient-indigo"><i class="fa fa-plus"></i></span>
                    <div class="mini-stat-info text-end text-muted">
                        <span class="countfect text-indigo" data-num="{{ $todayRents->total() }}"></span>
                        New Rents
                    </div>
                </div>
            </div>

        </div>

        <div class="totay_rents">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Today Rents</h3>
                    <a href="{{ route('rent') }}" class="btn py-1 px-3 btn-info">view All</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Position</th>
                                <th>Bad</th>
                                <th>Rent price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($todayRents as $todayRent)
                                <tr>
                                    <td>{{ $todayRent->title }}</td>
                                    <td>{{ $todayRent->type }}</td>
                                    <td>{{ $todayRent->position }}</td>
                                    <td>{{ $todayRent->bad }}</td>
                                    <td>{{ $currency }}{{ $todayRent->cost->rent_price }}</td>
                                    <td>
                                        <label class="switch">
                                            <a href="{{ route('rent.status.toggle', $todayRent->id) }}">
                                                <input type="checkbox" {{ $todayRent->is_active ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </a>
                                        </label>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="5">sorry, Today's rent not found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3 d-flex justify-content-end flex-wrap">
                        {{ $todayRents->onEachSide(3)->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
