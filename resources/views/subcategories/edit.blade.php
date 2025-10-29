@extends('layouts.app')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 m-auto">

            <form action="@role('visitor') # @else {{ route('subcategories.update', $subcategories->id) }} @endrole" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title m-0">Edit SubCategories</h3>
                    </div>
                    <div class="card-body">

                        <label class="m-0">Category</label>
                        <div class="form-group">
                            <select name="category_id" class="form-control" id="">
                                <option value="">Select category</option>
                                @foreach ($categories as $category)    
                                 <option value="{{ $category->id }}" {{ $category->id == $subcategories->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <label class="m-0">Name</label>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Enter the name"
                                value="{{ $subcategories->name }}" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <label class="m-0">Image</label>
                        <div class="form-group">
                            <input type="file" name="image" class="form-control"
                                 value="" />
                            @error('image')
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
