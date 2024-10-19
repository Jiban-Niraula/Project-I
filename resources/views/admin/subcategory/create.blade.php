@extends('layouts.master')

@section('title', 'SubCategory')
@section('content')

<div>
    <div class="container-fluid px-4">

        <div class="card mt-4">
            <div class="card-header">
                <h4>Add SubCategory</h4>
            </div>
            <div class="card-body">

                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                <form action="{{ url('admin/add-subcategory') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="mb-1">SubCategory Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="mb-1">Select Category</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Select a Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="mb-1">SubCategory Slug</label>
                        <input type="text" name="slug" class="form-control" required>
                    </div>

                    <h6>Status Mode</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <input type="checkbox" name="navbar_status" id="navbar_status">
                            <label for="navbar_status">Navbar Status</label>
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="checkbox" name="status" id="status">
                            <label for="status">Status</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Create Subcategory</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection
