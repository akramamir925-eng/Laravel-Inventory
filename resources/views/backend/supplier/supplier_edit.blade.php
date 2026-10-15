@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Supplier Page</h4><br><br>

                            <form method="post" action="{{ route('supplier.update') }}" enctype="multipart/form-data"
                                id="myForm">
                                @csrf
                                <input type="hidden" name="id" value="{{ $supplier->id }}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Name</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" name="name" id="name"
                                            value="{{ $supplier->name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Mobile</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" name="mobile_no" id="mobile_no"
                                            value="{{ $supplier->mobile_no }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Email</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="email" name="email" id="email"
                                            value="{{ $supplier->email }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Address</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" name="address" id="address"
                                            value="{{ $supplier->address }}">
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-info rounded waves-effect waves-light px-4 py-2 mt-2">Update
                                    Supplier</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

@endsection