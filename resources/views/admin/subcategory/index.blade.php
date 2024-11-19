@extends('layouts.master') <!-- Change this to your main layout -->

@section('title','SubCategories')
@section('content')

<div>
    <div class="container-fluid px-4">

        <div class="card mt-4 ">
            <div class="card-header">
                <h4 class="float-start">View SubCategory</h4>
                <a href="{{url('admin/add-subcategory')}}" class="btn btn-primary float-end btn-sm"> Add SubCategory</a>
            </div>

            <div class="card-body">
                @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="table-responsive ">
                    <table class="table table-bordered table-fixed">
                        <thead>
                            <tr>
                                <th style="width: 10%;">S.N.</th>
                                <th style="width: 30%;">Subcategory Name</th>
                                <th style="width: 20%;">Created by</th>
                                <th style="width: 15%;">Status</th>
                                <th style="width: 17%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            @foreach ($subcategories as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->Created_by->name ?? 'N/A' }}</td>
                                <td>{{ $item->status == '1' ? "Hidden" : "Shown" }}</td>
                                <td>
                                    <a href="{{url('admin/edit-subcategory/'.$item->id)}}">
                                        <button class="btn btn-success">Edit</button></a>

                                    <a href="{{('delete-subcategory/'.$item->id)}}">
                                        <button class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
