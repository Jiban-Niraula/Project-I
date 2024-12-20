@extends('layouts.master')

@section('title', 'Add Posts')

@section('content')

<div class="container-fluid px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="float-start">Add Posts</h4>
            <a href="{{ url('admin/add-post') }}" class="btn btn-primary float-end">Add Post</a>
        </div>

        <div class="card-body">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <form action="{{ url('admin/add-post') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name">Post Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="category">Faculty</label>
                    <select name="category_id" class="form-control" id="faculty">
                        <option value="">Select Category</option>
                        @foreach ($category as $cateitem)
                            <option value="{{ $cateitem->id }}" data-level="{{ $cateitem->levelType }}">
                                {{ $cateitem->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="subcategory">Level</label>
                    <select name="subcategory_id" class="form-control" id="subcategory">
                        <option value="">Select Level</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea id="mySummernote" name="description" rows="5" class="form-control"></textarea>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const facultySelect = document.getElementById('faculty');
        const subcategorySelect = document.getElementById('subcategory');

        function updateSubcategoryDropdown() {
            const selectedOption = facultySelect.options[facultySelect.selectedIndex];
            const levelType = selectedOption ? selectedOption.getAttribute('data-level') : null;

            subcategorySelect.innerHTML = '<option value="">Select Level</option>';

            if (levelType == 1) { // If the levelType is 1 (Semester)
                subcategorySelect.innerHTML += `<option value="1">Semester I</option>
                                                <option value="2">Semester II</option>
                                                <option value="3">Semester III</option>
                                                <option value="4">Semester IV</option>
                                                <option value="5">Semester V</option>
                                                <option value="6">Semester VI</option>
                                                <option value="7">Semester VII</option>
                                                <option value="8">Semester VIII</option>`;
            } else if (levelType == 2) { // If the levelType is 2 (Year)
                subcategorySelect.innerHTML += `<option value="1">Year I</option>
                                                <option value="2">Year II</option>
                                                <option value="3">Year III</option>
                                                <option value="4">Year IV</option>`;
            }
        }

        facultySelect.addEventListener('change', updateSubcategoryDropdown);

        updateSubcategoryDropdown();
    });
</script>
