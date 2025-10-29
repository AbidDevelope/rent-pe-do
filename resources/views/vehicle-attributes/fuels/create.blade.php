@extends('layouts.app')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 m-auto">

            <form action="@role('visitor') # @else {{ route('fuel.store') }} @endrole" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0">Add Fuel</h3>
                    </div>
                    <div class="card-body">

                        <label class="m-0">Name</label>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Enter the name"
                                value="" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
