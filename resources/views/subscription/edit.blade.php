@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8 m-auto">

                <!-- Start Subscription -->
                <form action="{{ route('subscription.update', $subscription->id) }}" method="POST">
                    @csrf
                    <div class="card rounded ">
                        <div class="card-header">
                            <h3 class="card-title m-0">Subscription Edit</h3>
                        </div>
                        <div class="card-body p-4">
                            <div class="form-group mb-3">
                                <label class="m-0">Subscription Title</label>
                                <input type="text" name="name" class="form-control" placeholder="Subscription Name" value="{{ $subscription->name }}"/>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="m-0">Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Price" value="{{ $subscription->price }}"/>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="m-0">Number of ads</label>
                                <input type="number" name="number_of_ads" class="form-control" placeholder="number of ads" value="{{ $subscription->number_of_ads }}" />
                                @error('number_of_ads')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label class="m-0">Duration</label>
                                        <input type="number" name="duration" class="form-control" placeholder="Duration" value="{{ $subscription->duration }}" />
                                        @error('duration')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="m-0">Duration Type</label>
                                        <select name="duration_type" class="form-control">
                                            <option value="day" @if ($subscription->duration_type == 'day') selected @endif>Day</option>
                                            <option value="month" @if ($subscription->duration_type == 'month') selected @endif>Month</option>
                                            <option value="year" @if ($subscription->duration_type == 'year') selected @endif>Year</option>
                                        </select>
                                        @error('duration_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="m-0">Description</label>
                                <textarea name="description" class="form-control" rows="10" placeholder="Description">{{ $subscription->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="m-0" for="statue">Status</label>
                                <input type="checkbox" id="statue" name="status" @if ($subscription->status == 1) checked @endif />

                            </div>

                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('subscription.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </form>
                <!-- End Subscription -->
            </div>
        </div>
    </div>
@endsection
