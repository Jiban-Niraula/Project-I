@extends('layouts.master') <!-- Change this to your main layout -->

@section('title','SubCategories')
@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="float-start">View SubCategory</h4>
                <a href="{{url('admin/add-subcategory')}}" class="btn btn-primary float-end btn-sm"> Add SubCategory</a>
            </div>


            <div class="card-body">
                @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                 @endif
                <table class="table table-bordered table-fixed mt-4">
                    <thead>
                        <tr>
                            <th style="width: 10%;">S.N.</th>
                            <th style="width: 25%;">Subcategory Name</th>
                            <th style="width: 25%;">Under Category</th>
                            <th style="width: 10%;">Created by</th>
                            <th style="width: 7%;">Status</th>
                            <th style="width: 12%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name ?? 'N/A' }}</td> <!-- Assuming you have a relationship with categories -->
                            <td>{{ $item->Created_by->name ?? 'N/A' }}</td>
                            <td>{{ $item->status == '1' ? "Hidden" : "Shown" }}</td>
                            <td>
                                <a href="{{ url('admin/edit-subcategory/' . $item->id) }}">
                                    <button class="btn btn-success">Edit</button>
                                </a>
                                <a href="{{ url('admin/delete-subcategory/' . $item->id) }}">
                                    <button class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
