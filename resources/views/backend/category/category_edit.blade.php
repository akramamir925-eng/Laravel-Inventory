@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Category Page</h4><br><br>

                            <form method="post" id="categoryForm" action="{{ route('category.update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" name="name" id="name"
                                            value="{{ $category->name }}">
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-info rounded waves-effect waves-light px-4 py-2 mt-2">Update
                                    Category</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

@endsection