@extends('layouts.app')
@section('content')
  <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="m-0">All SubCategories</h2>
                            </div>
                            <div class="col-6">
                                
                                    <div class="row justify-content-end">
                                    
                                        <div class="col-3 pl-1">
                                            <a href="{{ route('subcategories.create') }}" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;SubCategories</a>
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
                                        <th scope="col">Category</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategories as $key =>$subcategory)
                                        <tr>
                                            <td class="text-center">{{ $key+1 }}</td>
                                            <td>{{ $subcategory->name }}</td>
                                            <td>{{ $subcategory->category->name ?? 'N/A' }}</td>
                                            <td>
                                                <img src="{{ asset('images/subcategories/'. $subcategory->image) }}" alt="" height="70px">
                                            </td>
                                
                                            <td>
                                                <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-primary py-1 px-2">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('subcategories.delete', $subcategory->id) }}" class="btn btn-primary py-1 px-2">
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