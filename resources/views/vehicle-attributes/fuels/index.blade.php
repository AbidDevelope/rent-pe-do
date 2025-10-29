@extends('layouts.app')
@section('content')
  <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="m-0">All Fuels</h2>
                            </div>
                            <div class="col-6">
                                
                                    <div class="row justify-content-end">
                                    
                                        <div class="col-3 pl-1">
                                            <a href="{{ route('fuel.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Fuel</a>
                                        </div>
                                    </div>
                               
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-responsive-sm" id="myTable">
                                <thead class="bg-secondary">
                                    <tr>
                                        <th scope="col">Sl.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fuels as $key =>$fuel)
                                        <tr>
                                            <td class="text-center">{{ $key+1 }}</td>
                                            <td>{{ $fuel->name }}</td>
                                
                                           <td>
                                                <a href="{{ route('fuel.edit', $fuel->id) }}" class="btn btn-primary py-1 px-2">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('fuel.delete', $fuel->id) }}" class="btn btn-primary py-1 px-2">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection