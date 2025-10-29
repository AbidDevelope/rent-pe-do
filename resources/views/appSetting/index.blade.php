@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8 m-auto">

                <form action="@role('visitor') # @else {{ route('setting.update') }} @endrole" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title m-0">App Setting</h3>
                        </div>
                        <div class="card-body">
                            <label class="m-0">Ads show after rents</label>
                            <div class="input-group">
                                <input type="number" name="ads_count" class="form-control"
                                    placeholder="Ads Count after rents post" value="{{ $setting?->ads_count ?? 2 }}" />
                                @error('ads_count')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <input type="checkbox" name="ads_show" id="ads_show" {{ $setting?->ads_show ? 'checked' : '' }} style="width: 18px;height: 18px;"/>
                                <label for="ads_show" class="m-0 pl-1">Ads Show</label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
