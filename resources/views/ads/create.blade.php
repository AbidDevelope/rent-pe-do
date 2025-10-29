@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8 m-auto">

                <!-- Start Ads -->
                <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card rounded ">
                        <div class="card-header">
                            <h3 class="card-title m-0">Ads Create</h3>
                        </div>
                        <div class="card-body p-4">

                            <div class="form-group mb-3">
                                <label class="m-0">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') }}"/>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="m-0">Thumbnail Image</label>
                                <input type="file" name="thumbnail" class="form-control"/>
                                @error('thumbnail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ route('ads.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </form>
                <!-- End Subscription -->
            </div>
        </div>
    </div>
@endsection
