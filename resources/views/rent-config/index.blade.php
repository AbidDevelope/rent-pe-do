@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-md-6">
                <form action="@role('visitor') # @else {{ route('rentconfig.update', $rentConfig?->id) }} @endrole"
                    method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title m-0">Rent Configuration</h3>
                        </div>
                        <div class="card-body">
                            <h4 for="">Rent Posts</h4>
                            <div class="d-flex gap-3">
                                <div>
                                    <input type="radio" name="is_paid" value="0"
                                        @if (!$rentConfig?->is_paid) checked @endif id="free">
                                    <label for="free">Free</label>
                                </div>
                                <div class="pl-2">
                                    <input type="radio" name="is_paid" value="1"
                                        @if ($rentConfig?->is_paid) checked @endif id="Premium">
                                    <label for="Premium">Premium</label>
                                </div>
                            </div>
                            <div class="mt-3" id="price">
                                <label class="m-0">Post Price</label>
                                <input type="number" name="price" class="form-control"
                                    value="{{ $rentConfig?->price ?? 0 }}" />
                            </div>
                        </div>
                        <div class="card-footer">
                            @role('visitor')
                                <button class="btn btn-info px-4 visitorMessage" type="button">Update</button>
                            @else
                                <button class="btn btn-info px-4" type="submit">Update</button>
                            @endrole
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        #price {
            display: block;
        }

        #price.hidden {
            display: none;
        }
    </style>
@endsection
@push('scripts')
    <script>
        window.onload = function() {
            var freeRadio = document.getElementById('free');
            var priceDiv = document.getElementById('price');

            if (freeRadio.checked) {
                priceDiv.classList.add('hidden');
                document.querySelector('#price input').value = 0;
            } else {
                priceDiv.classList.remove('hidden');
                document.querySelector('#price input').setAttribute('required', true);
            }
        };
        document.getElementById('free').addEventListener('change', function() {
            document.getElementById('price').classList.add('hidden');
            document.querySelector('#price input').removeAttribute('required');
            document.querySelector('#price input').value = 0;
        });

        document.getElementById('Premium').addEventListener('change', function() {
            document.getElementById('price').classList.remove('hidden');
            document.querySelector('#price input').setAttribute('required', true);
        });
    </script>
@endpush
