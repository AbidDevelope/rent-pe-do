@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8 m-auto">

                <!-- Start Subscription -->
                <form action="{{ route('subscription.store') }}" method="POST">
                    @csrf
                    <div class="card rounded ">
                        <div class="card-header">
                            <h3 class="card-title m-0">Subscription</h3>
                        </div>
                        <div class="card-body p-4">
                            <div class="form-group mb-3">
                                <label class="m-0">Subscription Title</label>
                                <input type="text" name="name" class="form-control" placeholder="Subscription Name" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="m-0">Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Price" />
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="m-0">Number of ads</label>
                                <input type="number" name="number_of_ads" class="form-control" placeholder="Currency" />
                                @error('number_of_ads')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label class="m-0">Duration</label>
                                        <input type="number" name="duration" class="form-control" placeholder="Duration" />
                                        @error('duration')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="m-0">Duration Type</label>
                                        <select name="duration_type" class="form-control">
                                            <option value="day">Day</option>
                                            <option value="month">Month</option>
                                            <option value="year">Year</option>
                                        </select>
                                        @error('duration_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="m-0">Description</label>
                                <textarea name="description" class="form-control" rows="10" placeholder="Description"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="{{ route('subscription.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </form>
                <!-- End Subscription -->
            </div>
        </div>
    </div>
@endsection
