@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        @php
            $currency = $currency ? $currency->symbol : '$';
        @endphp
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="card-title m-0">Rent Details</h2>
                <a href="{{ route('rent') }}" class="btn btn-light">Back</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-responsive-md">
                        <thead class="bg-secondary">
                            <tr>
                                <th>Title</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-bold">Thumbnail</td>

                                <td>
                                    @foreach ($rent->thumbnails as $photo)
                                        <img src="{{ $photo['src'] }}" class="img-thumbnail pr-1" width="120"
                                            height="80">
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="text-bold">Title</td>
                                <td>{{ $rent->title }}</td>
                            </tr> 
                            <tr>
                                <td class="text-bold">Description</td>
                                <td>{{ $rent->description }}</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Post Status</td>
                                <td>
                                    @if ($rent->is_paid)
                                        <span class="badge bg-danger text-white">premium</span>
                                        <span class="badge bg-secondary">{{ $currency . $rent->ads_price }}</span>
                                    @else
                                        <span class="badge bg-light">free</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-bold">Active Status</td>
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
                            </tr>

                            <tr>
                                <td class="text-bold">Home Details</td>
                                <td>
                                    <table class="w-100">
                                        <tr class="bg-secondary">
                                            <td>Type</td>
                                            <td>Position</td>
                                            <td>Washroom</td>
                                            <td>Balcony</td>
                                            <td>Bad</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $rent->type }}</td>
                                            <td>{{ $rent->position }}</td>
                                            <td>{{ $rent->washroom }}</td>
                                            <td>{{ $rent->balcony }}</td>
                                            <td>{{ $rent->bad }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-bold">Rent Info</td>
                                <td>
                                    <table class="w-100">
                                        <tr class="bg-secondary">
                                            <td>Available from</td>
                                            <td>City</td>
                                            <td>Area</td>
                                            <td>Address</td>
                                        </tr>
                                        <tr>
                                            <td>{{ Carbon\Carbon::parse($rent->rentInfo->available_from)->format('M d, Y') }}
                                            </td>
                                            <td>{{ $rent->rentInfo->city->name }}</td>
                                            <td>{{ $rent->rentInfo->area->name }}</td>
                                            <td>{{ $rent->rentInfo->address }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-bold">Facilities</td>
                                <td>
                                    <table class="w-100">
                                        <tr class="bg-secondary">
                                            <td>Lift</td>
                                            <td>Generator</td>
                                            <td>Guard</td>
                                            <td>Parking</td>
                                            <td>Gas</td>
                                            <td>Internet</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $rent->facility->lift ? 'Yes' : 'No' }}</td>
                                            <td>{{ $rent->facility->generator ? 'Yes' : 'No' }}</td>
                                            <td>{{ $rent->facility->guard ? 'Yes' : 'No' }}</td>
                                            <td>{{ $rent->facility->parking ? 'Yes' : 'No' }}</td>
                                            <td>{{ $rent->facility->gas ? 'Yes' : 'No' }}</td>
                                            <td>{{ $rent->facility->internet ? 'Yes' : 'No' }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-bold">Cost</td>
                                <td>
                                    <table class="w-100">
                                        <tr class="bg-secondary">
                                            <td>Rent price</td>
                                            <td>Electric</td>
                                            <td>Water</td>
                                            <td>Gas</td>
                                            <td>Service</td>
                                            <td>Negotiable</td>
                                            <td>Others</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $currency }}{{ $rent->cost->rent_price }}</td>
                                            <td>{{ $currency }}{{ $rent->cost->electric }}</td>
                                            <td>{{ $currency }}{{ $rent->cost->water }}</td>
                                            <td>{{ $currency }}{{ $rent->cost->gas }}</td>
                                            <td>{{ $currency }}{{ $rent->cost->service }}</td>
                                            <td>{{ $rent->cost->negotiable ? 'Yes' : 'No' }}</td>
                                            <td>{{ $currency }}{{ $rent->cost->others }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-bold">For Rent</td>
                                <td>
                                    <table class="w-100">
                                        <tr class="bg-secondary">
                                            <td>Male student</td>
                                            <td>Female student</td>
                                            <td>Man job</td>
                                            <td>Women job</td>
                                            <td>Any</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $rent->forRent->male_student ? 'Yes' : 'No' }}</td>
                                            <td>{{ $rent->forRent->female_student ? 'Yes' : 'No' }}</td>
                                            <td>{{ $rent->forRent->man_job ? 'Yes' : 'No' }}</td>
                                            <td>{{ $rent->forRent->women_job ? 'Yes' : 'No' }}</td>
                                            <td>{{ $rent->forRent->any ? 'Yes' : 'No' }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-bold">Religions</td>
                                <td>
                                    <table class="w-100">
                                        <tr class="bg-secondary">
                                            <td>Islam</td>
                                            <td>Hindu</td>
                                            <td>Christian</td>
                                            <td>Bouddho</td>
                                            <td>Any</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $rent->religion->islam ? 'Yes' : 'No' }}</td>
                                            <td>{{ $rent->religion->hindu ? 'Yes' : 'No' }}</td>
                                            <td>{{ $rent->religion->christian ? 'Yes' : 'No' }}</td>
                                            <td>{{ $rent->religion->bouddho ? 'Yes' : 'No' }}</td>
                                            <td>{{ $rent->religion->any ? 'Yes' : 'No' }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
