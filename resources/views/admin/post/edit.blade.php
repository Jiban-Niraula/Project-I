@extends('layouts.master') <!-- Change this to your main layout -->

@section('title', 'Edit Post')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="float-start">Edit Post</h4>
            <a href="{{ url('admin/posts') }}" class="btn btn-primary float-end">Back</a>
        </div>

        <div class="card-body">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <form action="{{ url('admin/edit-post/' . $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name">Post Name</label>
                    <input type="text" value="{{ $post->name }}" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="category">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($categories as $cateitem)
                            <option value="{{ $cateitem->id }}" {{ $cateitem->id == $post->category_id ? 'selected' : '' }}>
                                {{ $cateitem->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="subcategory">SubCategory</label>
                    <select name="subcategory_id" class="form-control">
                        <option value="">Select SubCategory</option>
                        @foreach($subcategories as $subcateitem)
                            <option value="{{ $subcateitem->id }}" {{ $subcateitem->id == $post->subcategory_id ? 'selected' : '' }}>
                                {{ $subcateitem->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" value="{{ $post->slug }}" name="slug" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="mySummernote" rows="4" class="form-control">{{ $post->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="yt_iframe">Youtube IFrame</label>
                    <input type="text" value="{{ $post->yt_iframe }}" name="yt_iframe" class="form-control">
                </div>

                <h4>SEO Tags</h4>
                <div class="mb-3">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" value="{{ $post->meta_title }}" name="meta_title" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" rows="4" class="form-control">{{ $post->meta_description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="meta_keyword">Meta Keywords</label>
                    <input type="text" value="{{ $post->meta_keyword }}" name="meta_keyword" class="form-control">
                </div>

                <h4>Status</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <input type="checkbox" name="status" {{ $post->status ? 'checked' : '' }}>
                            <label for="status">Active</label>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" name="navbar_status" {{ $post->navbar_status ? 'checked' : '' }}>
                            <label for="navbar_status">Show in Navbar</label>
                        </div>
                    </div>
                </div>

                <div class="float-end mb-3">
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
