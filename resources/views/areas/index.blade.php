@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        @if ($errors->any())
            {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="card-title m-0">All Area List</h2>
                <button class="btn btn-success" data-toggle="modal" data-target="#addNewArea">
                    <i class="fa fa-plus"></i> Add New Area
                </button>
            </div>

            <!--Add Area Modal -->
            <div class="modal fade" id="addNewArea">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom border-secondary">
                            <h5 class="modal-title">Add New Area</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @role('visitor') action="#" @else action="{{ route('area.add') }}" @endrole method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group mb-2">
                                    <label class="m-0">Area Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group mb-1">
                                    <label class="m-0">Select City</label>
                                    <select name="city_id" class="form-control" required>
                                        <option disabled selected>---Select---</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer border-top py-2">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                @role('visitor')
                                    <button type="button" class="btn btn-primary visitorMessage">Save</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Save</button>
                                @endrole
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="text-center">SL.</th>
                            <th>Name</th>
                            <th>City Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($areas as $key => $area)
                            <tr>

                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $area->name }}</td>
                                <td>{{ $area->city->name }}</td>
                                <td class="text-center">
                                    <button data-target="#editArea{{ $area->id }}" data-toggle="modal"
                                        class="btn btn-info btn-sm text-white"> <i class="fas fa-edit"></i> </button>
                                </td>
                            </tr>
                            {{-- Edit city modal --}}
                            <div class="modal fade" id="editArea{{ $area->id }}">
                                <div class="modal-dialog modal-md modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom border-secondary">
                                            <h4 class="modal-title">Edit Area</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form
                                            @role('visitor') action="#" @else action="{{ route('area.edit', $area->id) }}" @endrole
                                            method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group mb-2">
                                                    <label class="m-0">Area Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ $area->name }}" required>
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label class="m-0">Select City</label>
                                                    <select name="city_id" class="form-control">
                                                        @foreach ($cities as $city)
                                                            <option @if ($city->name == $area->city->name) selected @endif
                                                                value="{{ $city->id }}">{{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-top py-2">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                @role('visitor')
                                                    <button type="button" class="btn btn-primary visitorMessage">Update</button>
                                                @else
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                @endrole
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection