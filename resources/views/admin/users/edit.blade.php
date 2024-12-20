@extends('layouts.master') <!-- Change this to your main layout -->

@section('title', 'Edit Users')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="float-start">Edit Users</h4>
            {{-- <a href="{{ url('admin/posts') }}" class="btn btn-primary float-end">Back</a> --}}
        </div>

        <div class="card-body">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <form action="{{ url('admin/edit-users/' . $users->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" value="{{ $users->name }}" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="name">Phone Number</label>
                    <input type="text" value="{{ $users->number }}" name="number" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="name">Email</label>
                    <input type="email" value="{{ $users->email }}" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="name">Date of Birth</label>
                    <input type="date" value="{{ $users->dob }}" name="dob" class="form-control">
                </div>



                <div class="float-end mb-3">
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
