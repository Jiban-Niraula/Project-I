@extends('layouts.master')

@section('title','Category')
@section('content')

<div>
    <div class="container-fluid px-4">

        <div class="card mt-4">

            <div class="card-header">
                <h4>Add Category</h4>


            </div>
            <div class="card-body">

                @if($errors->any())
                    @foreach ($errors->all() as $error) <!-- Corrected here -->
                     <div class="alert alert-danger">{{ $error }}</div>
                  @endforeach
                @endif


                <form action="{{url('admin/add-category')}}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label for="" class="mb-1">Category Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="" class="mb-1">Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="" class="mb-1">Description</label>
                        <textarea type="text" name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="mb-1">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="mt-4 mb-3">
                        <h5 >SEO Tags</h5>
                    </div>


                    <div class="mb-3">
                        <label for="" class="mb-1">Meta Tile</label>
                        <input type="text" name="meta_title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="" class="mb-1">Meta Description</label>
                        <input type="text" name="meta_description" class="form-control">
                    </div>


                    <div class="mb-3">
                        <label for="" class="mb-1">Meta Keyword</label>
                        <input type="text" name="meta_keyword" class="form-control">
                    </div>


                    <h6>Status Mode</h6>
                    <div class="row">

                        <div class="col-md-3 mb-3">
                            <input type="checkbox" name="navbar_status">
                            <label for="Navbar Status">Navbar Status</label>
                        </div>

                        <div class="col-md-3 mb-3">
                            <input type="checkbox" name="status">
                            <label for="Status">Status</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Create Category</button>
                    </div>
                </form>
            </div>

        </div>

</div>


@endsection

