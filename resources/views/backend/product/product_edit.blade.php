@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Product Page</h4><br><br>

                            <form method="post" action="{{ route('product.update') }}" enctype="multipart/form-data"
                                id="ProductForm">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="form-group col-sm-10">
                                        <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Supplier Name</label>
                                    <div class="form-group col-sm-10">
                                        <select class="form-select" name="supplier_id">
                                            @foreach ($supplier as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $product->supplier_id ? 'selected' : '' }} >{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Unit</label>
                                    <div class="form-group col-sm-10">
                                        <select class="form-select" name="unit_id">
                                            @foreach ($unit as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $product->unit_id ? 'selected' : '' }} >{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Category</label>
                                    <div class="form-group col-sm-10">
                                        <select class="form-select" name="category_id">
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }} >{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-info rounded waves-effect waves-light px-4 py-2 mt-2">Update
                                    Product</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

@endsection