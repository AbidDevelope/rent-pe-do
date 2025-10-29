@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="card-title m-0">All Social Link</h2>
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addsocialModal">Add Social Link</button>
            </div>

            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead class="bg-secondary">
                        <tr>
                            <th>SL.</th>
                            <th>Icon</th>
                            <th>Link</th>
                            <th>Target</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @php
                        $i = 1;
                    @endphp
                    <tbody>
                        @foreach ($links as $link)
                            <tr>
                                <td> {{ $i++ }}</td>
                                <td> <i class="fab {{ $link->icon }}" style="font-size: 20px"></i></td>
                                <td> {{ $link->link }}</td>
                                <td> {{ $link->target }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-toggle="modal"
                                        data-target="#editsocial{{ $link->id }}"><i class="fas fa-edit"></i></button>
                                    <a href="{{ route('setting.socialLink.delete', $link->id) }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="editsocial{{ $link->id }}">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Social Link</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('setting.socialLink.update', $link->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="mb-0">Select Social Name</label>
                                                    <select name="icon" class="form-control">
                                                        <option value="{{ $link->icon }}">{{ $link->icon }}</option>
                                                        <option value="fa-facebook-f">FaceBook</option>
                                                        <option value="fa-twitter">Twitter</option>
                                                        <option value="fa-instagram">Instagram</option>
                                                        <option value="fa-linkedin-in">Linkedin-in</option>
                                                        <option value="fa-youtube">Youtube</option>
                                                        <option value="fa-github">Github</option>
                                                        <option value="fa-google-play">Google-play</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb-0">Social Link</label>
                                                    <textarea name="link" class="form-control" rows="3" required>{{ $link->link }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="mb-0">Target</label>
                                                    <select name="target" class="form-control">
                                                        <option value="{{ $link->target }}">{{ $link->target }}</option>
                                                        <option value="{{ $link->target }}"></option>
                                                        <option value="blank">blank</option>
                                                        <option value="_blank">_blank(new tap)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
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

    <!-- Modal -->
    <div class="modal fade" id="addsocialModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Social Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('setting.socialLink.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="mb-0">Select Social Name</label>
                            <select name="icon" class="form-control" required>
                                <option value="">--Select--</option>
                                <option value="fa-facebook-f">FaceBook</option>
                                <option value="fa-twitter">Twitter</option>
                                <option value="fa-instagram">Instagram</option>
                                <option value="fa-linkedin-in">Linkedin-in</option>
                                <option value="fa-youtube">Youtube</option>
                                <option value="fa-github">Github</option>
                                <option value="fa-google-play">Google-play</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mb-0">Social Link</label>
                            <textarea name="link" class="form-control" placeholder="Enter Social Link URL" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="mb-0">Target</label>
                            <select name="target" class="form-control">
                                <option value=""></option>
                                <option value="blank">blank</option>
                                <option value="_blank">_blank(new tap)</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
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

    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM

        });
    </script>
@endsection
