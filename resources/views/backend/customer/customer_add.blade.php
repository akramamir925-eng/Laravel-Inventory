@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Customer Page</h4><br><br>

                            <form method="post" id="myForm" action="{{ route('customer.store') }}" enctype="multipart/form-data"
                                id="myForm">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" name="name" id="name"
                                            placeholder="Customer Name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Mobile</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="phone" name="mobile_no" id="mobile_no"
                                            placeholder="Customer Mobile">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Email</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="email" name="email" id="email"
                                            placeholder="Customer Email">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Address</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" name="address" id="address"
                                            placeholder="Customer Address">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Image</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="file" name="customer_image" id="image">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img class="avatar-xl rounded" id="show_image"
                                            src="{{ asset('upload/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-info rounded waves-effect waves-light px-4 py-2 mt-2">Add
                                    Customer</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

@endsection