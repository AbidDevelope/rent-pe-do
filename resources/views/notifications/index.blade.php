@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('notification.send') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-primary py-2">
                            <h2 class="card-title m-0 text-white">Send Notifications</h2>
                        </div>
                        <div class="card-body">
                            <div class="forg-group">
                                <label class="mb-1">Message</label>
                                <textarea name="message" class="form-control" rows="4" placeholder="Notification Message..."></textarea>
                                @error('message')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end mt-2">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                            <hr class="my-3">
                            <div class="d-flex justify-content-end align-items-center">
                                <span class="font-weight-600 mr-1">Device Type:</span>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle text-capitalize" id="triggerId"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        style="width: 150px">
                                        {{ request()->device_type ?? 'all' }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="triggerId">
                                        <a class="dropdown-item"
                                            href="{{ route('notification.index', 'device_type=all') }}">All</a>
                                        <a class="dropdown-item"
                                            href="{{ route('notification.index', 'device_type=android') }}">Android</a>
                                        <a class="dropdown-item"
                                            href="{{ route('notification.index', 'device_type=ios') }}">Ios</a>
                                    </div>
                                </div>
                            </div>
                            @error('customer')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="table-responsive-md mt-2">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="px-0 text-center" style="width: 42px">
                                                <input type="checkbox" onclick="toggle(this);" />
                                            </th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td class="py-2 px-0 text-center">
                                                    <input type="checkbox" name="customer[]" value="{{ $customer->id }}">
                                                </td>
                                                <td class="py-2">{{ $customer->user->name }}</td>
                                                <td class="py-2">{{ $customer->user->phone }}</td>
                                                <td>{{ $customer->user->email }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggle(source) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
            }
        }
    </script>
@endpush
