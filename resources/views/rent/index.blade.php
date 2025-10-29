@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        @php
            $currency = $currency ? $currency->symbol : '$';
        @endphp
        <div class="card">
            <div class="card-header">
                <h2 class="card-title m-0">All Rents</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="text-center">SL.</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Position</th>
                            <th>Bad</th>
                            <th>Post Status</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rents as $key => $rent)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $rent->title }}</td>
                                <td>{{ $rent->type }}</td>
                                <td>{{ $rent->position }}</td>
                                <td>{{ $rent->bad }}</td>
                                <td>
                                    @if ($rent->is_paid)
                                        <span class="badge bg-danger text-white">premium</span>
                                        <span class="badge bg-secondary">{{ $currency . $rent->ads_price }}</span>
                                    @else
                                        <span class="badge bg-light">free</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($rent->is_paid)
                                        @if ($rent->payment_status == 'pending')
                                            <span class="badge bg-warning text-white">Pending</span>
                                        @else
                                            <span class="badge bg-success text-white">Paid</span>
                                        @endif
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @role('visitor')
                                        <label class="switch">
                                            <a href="#" class="visitorMessage">
                                                <input type="checkbox" {{ $rent->is_active ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </a>
                                        </label>
                                    @else
                                        <label class="switch">
                                            <a href="{{ route('rent.status.toggle', $rent->id) }}">
                                                <input type="checkbox" {{ $rent->is_active ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </a>
                                        </label>
                                    @endrole
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('rent.details', $rent->id) }}" class="btn py-2 btn-info">
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
@endsection
