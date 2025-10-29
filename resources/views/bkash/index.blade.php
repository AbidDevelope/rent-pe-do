@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8 m-auto">

                <form action="@role('visitor') # @else {{ route('bkash.update') }} @endrole" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title m-0">Bkash Payment Setting</h3>
                        </div>
                        <div class="card-body">

                            <label class="m-0">Bkash App Key</label>
                            <div class="form-group">
                                <input type="text" name="app_key" class="form-control" placeholder="Bkash App Key"
                                    value="{{ $bkash?->app_key }}" />
                                @error('app_key')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="m-0">Bkash App Secret</label>
                            <div class="form-group">
                                <input type="text" name="app_secret" class="form-control"
                                    placeholder="Bkash App Secret Key" value="{{ $bkash?->app_secret }}" />
                                @error('app_secret')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="m-0">Username</label>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="username"
                                    value="{{ $bkash?->username }}" />
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <label class="m-0">Password</label>
                            <div class="form-group">
                                <input type="text" name="password" class="form-control" placeholder="password"
                                    value="{{ $bkash?->password }}" />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save And update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
