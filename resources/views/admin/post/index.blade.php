@extends('layouts.master') <!-- Change this to your main layout -->

<<<<<<< HEAD
@section('title', 'Posts')
=======
@section('title','Posts')
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5

@section('content')

<div class="container-fluid px-4">
<<<<<<< HEAD
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="float-start">View Posts</h4>
            <a href="{{ url('admin/add-post') }}" class="btn btn-primary float-end">Add Post</a>
        </div>

        <div class="card-body">

            @if (session('message'))
            <div id="message" class="alert alert-success">{{ session('message') }}</div>
            <script>
                // Wait for 3 seconds before hiding the message
                setTimeout(function() {
                    document.getElementById('message').style.display = 'none';
                }, 3000); // 3000 milliseconds = 3 seconds
            </script>
        @endif
        
        

            <table id="myTable" class="table display table-bordered" style="border-top: 1px solid #dee2e6;">
                <thead>
                    <tr>
                        <th style="width: 20%;">S.N.</th>
                        <th style="width: 20%;">Post Title</th>
                        <th style="width: 20%;">Faculty</th>
                        <th style="width: 10%;">Level</th>
                        <th style="width: 7%;">Created by</th>
=======

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
                        <th style="width: 20%;">Category</th>
                        <th style="width: 10%;">SubCategory</th>
                        <th style="width: 7%">Created by</th>
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
                        <th style="width: 8%;">State</th>
                        <th style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
<<<<<<< HEAD
                        @foreach ($posts as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ optional($item->Category)->name }}</td>
                                <td>{{ $item->subcategory }}</td>
                                <td>{{ optional($item->Created_by)->name ?? 'N/A' }}</td>
                                <td>{{ $item->status == 1 ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/edit-post/'.$item->id) }}">
                                        <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                                    </a>
                                    <a href="{{ url('admin/delete-post/'.$item->id) }}">
                                        <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
=======
                    @foreach ($posts as $index => $item )
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->Category->name }}</td>
                        <td>{{ $item->subcategory->name }}</td>
                        <td>{{$item->Created_by->name ?? 'N/A'}}</td>
                        <td>{{ $item->status == 1 ? 'Hidden':'Visible'}}</td>
                        <td>
                            <a href="{{url('admin/edit-post/'.$item->id)}}"><button class="btn btn-success">Edit</button></a>
                            <a href="{{('delete-post/'.$item->id)}}"><button class="btn btn-danger">Delete</button></a>
                         </td>

                    @endforeach
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
                </tbody>
            </table>
        </div>
    </div>
<<<<<<< HEAD
</div>

=======

</div>
>>>>>>> 8de0a9524c2f700101684a16472758e507afcee5
@endsection
