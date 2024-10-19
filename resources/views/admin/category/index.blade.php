@extends('layouts.master')

@section('title','Category')
@section('content')

<div>
    <div class="container-fluid px-4">

        <div class="card mt-4">
            <div class="card-header">
                <h4 class="float-start">View Category</h4>
                <a href="{{url('admin/add-category')}}" class="btn btn-primary float-end btn-sm"> Add Category</a>
            </div>

            <div class="card-body">

                @if (@session('message'))
                 <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                <table class="table table-bordered table-fixed">
                    <thead>
                        <tr>
                            <th style="width: 10%;">S.N.</th>
                            <th style="width: 30%;">Category Name</th>
                            <th style="width: 25%;">Image</th>
                            <th style="width: 15%;">Status</th>
                            <th style="width: 15%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $index => $item)
                        <tr>
                            <td>{{ $index + 1}}</td>
                            <td>{{ $item -> name}}</td>
                            <td>
                                <img src="{{asset('uploads/category/'.$item ->image)}}" alt="{{$item->name.'->img'}}" height="50px" width="50px">
                            </td>
                            <td>{{ $item -> status=='1' ? "Hidden":"Shown"}}</td>

                            <td>
                               <a href="{{url('admin/edit-category/'.$item->id)}}"><button class="btn btn-success">Edit</button></a>
                               <a href=""><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>






        </div>
</div>


@endsection

