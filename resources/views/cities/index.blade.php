@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="card-title m-0">All City List</h2>
                <button class="btn btn-success" data-toggle="modal" data-target="#addNewCity"><i class="fa fa-plus"></i> Add New
                    City</button>
            </div>


            <!--Add City Modal -->
            <div class="modal fade" id="addNewCity">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom border-secondary">
                            <h5 class="modal-title">Add New City</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form @role('visitor') action="#" @else action="{{ route('city.add') }}" @endrole method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group mb-2">
                                    <label class="m-0">City Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group mb-1">
                                    <label class="m-0">Short Name</label>
                                    <input type="text" name="short_name" class="form-control" placeholder="Short Name"
                                        required>
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
                            <th>Short Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $key => $city)
                            <tr>

                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->short_name }}</td>
                                <td class="text-center">
                                    <button data-target="#editCity{{ $city->id }}" data-toggle="modal"
                                        class="btn btn-info btn-sm text-white"> <i class="fas fa-edit"></i> </button>
                                </td>
                            </tr>
                            {{-- Edit city modal --}}
                            <div class="modal fade" id="editCity{{ $city->id }}">
                                <div class="modal-dialog modal-md modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom border-secondary">
                                            <h4 class="modal-title">Edit City</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form @role('visitor') action="#" @else action="{{ route('city.edit', $city->id) }}" @endrole method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group mb-2">
                                                    <label class="m-0">City Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ $city->name }}" required>
                                                </div>
                                                <div class="form-group mb-1">
                                                    <label class="m-0">Short Name</label>
                                                    <input type="text" name="short_name" class="form-control"
                                                        value="{{ $city->short_name }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-top py-2">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                @role('visitor')
                                                    <button type="button"
                                                        class="btn btn-primary visitorMessage">Update</button>
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
