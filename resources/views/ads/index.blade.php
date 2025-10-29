@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="card-title m-0">All Ads</h2>
                <a href="{{ route('ads.create') }}" class="btn btn-success">Add New</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="text-center">SL.</th>
                            <td>Thumbnail</td>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ads as $key => $ad)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ $ad->thumbnail }}" alt="" width="120">
                                </td>
                                <td>{{ $ad->title }}</td>
                                <td>{{ Carbon\Carbon::parse($ad->created_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('ads.destroy', $ad->id) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
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
