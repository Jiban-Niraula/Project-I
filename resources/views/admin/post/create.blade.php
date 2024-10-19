@extends('layouts.master') <!-- Change this to your main layout -->

@section('title','Add Posts')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">

        <div class="card-header">
            <h4 class="float-start">Add Posts</h4>
            <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Post</a>
        </div>

        <div class="card-body">

            @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            @endif


            <form action="{{url('admin/add-post')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name">Post Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="category">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($category as $cateitem)
                        <option value="{{$cateitem->id}}">{{$cateitem->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="subcategory">SubCategory</label>
                    <select name="subcategory_id" class="form-control">
                        <option value="">Select SubCategory</option>
                        @foreach($subcategory as $subcateitem)
                        <option value="{{$subcateitem->id}}">{{$subcateitem->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" rows="4" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Youtube IFrame</label>
                    <input type="text" name="yt_iframe" class="form-control">
                </div>

                <h4>SEO Tags</h4>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="4" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="">Meta Keywords</label>
                    <input type="text" name="meta_keyword" class="form-control">
                </div>

                <h4>Status</h4>
                <div class="row">
                    <div class="col-mod-4">
                        <div class="mb-3">
                            <input type="checkbox" name="status">
                            <label for="">Status</label>
                        </div>
                    </div>
                </div>

                <div class="float-end mb-3">

                        <button type="submit" class="btn btn-primary float-end">Save Post</button>

                </div>
            </form>
        </div>
    </div>

</div>
@endsection
