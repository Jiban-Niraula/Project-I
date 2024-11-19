@extends('layouts.master')

@section('title', 'Edit Subcategory')

@section('content')

<div>
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Edit Subcategory</h4>
            </div>

            <div class="card-body">
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif

                <form action="{{ url('admin/update-subcategory/'.$subcategory->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="mb-1">Subcategory Name</label>
                        <input type="text" value="{{ $subcategory->name }}" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="mb-1">Subcategory Slug</label>
                        <input type="text" value="{{ $subcategory->slug }}" name="slug" class="form-control">
                    </div>

                    <h6>Status Mode</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <input type="checkbox" name="navbar_status" {{ $subcategory->navbar_status == '1' ? 'checked' : '' }}>
                            <label for="navbar_status">Navbar Status</label>
                        </div>

                        <div class="col-md-3 mb-3">
                            <input type="checkbox" name="status" {{ $subcategory->status == '1' ? 'checked' : '' }}>
                            <label for="status">Status</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Update Subcategory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
