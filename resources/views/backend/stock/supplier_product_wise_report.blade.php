@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Supplier Wise Product Wise Report</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <strong>Supplier Wise Report</strong>
                                    <input type="radio" name="supplier_product_wise" value="supplier_wise"
                                        class="search_value">
                                    <strong>Product Wise Report</strong>
                                    <input type="radio" name="supplier_product_wise" value="product_wise"
                                        class="search_value">
                                </div>
                            </div>

                            <div class="show_supplier" style="display: none;">
                                <form method="GET" action="{{ route('supplier.wise.pdf') }}" id="stockForm" target="_blank">
                                    <div class="row">
                                        <div class="col-sm-8 form-group">
                                            <label>Supplier Name</label>
                                            <select name="supplier_id" id="supplier_id" class="form-select select2">
                                                <option value="">Select Supplier</option>
                                                @foreach($supplier as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4" style="padding-top: 28px;">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-search"></i>Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="show_product" style="display: none;">
                                <form method="GET" action="{{ route('product.wise.pdf') }}" id="stockForm" target="_blank">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="md-3">
                                                <label for="example-text-input" class="form-label">Category Name </label>
                                                <select name="category_id" id="category_id" class="form-select select2"
                                                    aria-label="Default select example">
                                                    <option selected="">Open this select menu</option>
                                                    @foreach($category as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="md-3">
                                                <label for="example-text-input" class="form-label">Product Name </label>
                                                <select name="product_id" id="product_id" class="form-select select2"
                                                    aria-label="Default select example">
                                                    <option selected="">Open this select menu</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4" style="padding-top: 28px;">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-search"></i>Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>
    <script type="text/javascript">
        $(function () {
            $(document).on('change', '#category_id', function () {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-product') }}",
                    type: "GET",
                    data: { category_id: category_id },
                    success: function (data) {
                        var html = '<option value="">Select Product</option>';
                        $.each(data, function (key, v) {
                            html += '<option value=" ' + v.id + ' "> ' + v.name + '</option>';
                        });
                        $('#product_id').html(html);
                    }
                })
            });
        });
    </script>
@endsection