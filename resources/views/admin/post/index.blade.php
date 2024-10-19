@extends('layouts.master') <!-- Change this to your main layout -->

@section('title','Posts')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">



        <div class="card-header">
            <h4 class="float-start">View Posts</h4>
            <a href="{{url('admin/add-post')}}" class="btn btn-primary float-end">Add Post</a>
        </div>

        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <table class="table table-bordered" style="width: 100%">
                <thead>
                    <tr>
                        <th style="width: 05%;">S.N.</th>
                        <th style="width: 20%;">Post Title</th>
                        <th style="width: 25%;">Category</th>
                        <th style="width: 10%;">SubCategory</th>
                        <th style="width: 10%;">State</th>
                        <th style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $index => $item )
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->Category->name }}</td>
                        <td>{{ $item->subcategory->name }}</td>
                        <td>{{ $item->status == 1 ? 'Hidden':'Visible'}}</td>
                        <td>
                            <a href="{{url('admin/edit-post/'.$item->id)}}"><button class="btn btn-success">Edit</button></a>
                            <a href="{{('delete-post/'.$item->id)}}"><button class="btn btn-danger">Delete</button></a>
                         </td>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
