@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title m-0">Currency</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <form action="@role('visitor') # @else {{ route('setting.currency') }} @endrole" method="POST">
                            @csrf
                            @php
                                $currentSymbol = $currency ? $currency->symbol : '$';
                            @endphp
                            <label class="m-0">Select Currency</label>
                            <div class="input-group">
                                <select name="symbol" class="form-control" style="font-size: 18px;">
                                    <option value="">----Select----</option>
                                    @foreach (config('enums.currencies') as $symbol)
                                        <option @if ($currentSymbol == $symbol) selected @endif
                                            value="{{ $symbol }}">{{ $symbol }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    @role('visitor')
                                        <button class="btn btn-info px-4 visitorMessage" type="button">Update</button>
                                    @else
                                        <button class="btn btn-info px-4" type="submit">Update</button>
                                    @endrole
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6 d-flex align-items-center border-left">
                        <div class="">
                            <span class="text-gray">Current currency symbol is</span>
                            <span class="font-weight-bold" style="font-size: 20px">{{ $currentSymbol }}</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
