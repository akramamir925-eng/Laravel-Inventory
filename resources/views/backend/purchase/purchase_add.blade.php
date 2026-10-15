@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Product Page</h4><br><br>

                            <div class="row align-content-center">
                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Date</label>
                                        <input class="form-control example-date-input" name="date" type="date" id="date">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Purchase No</label>
                                        <input class="form-control example-date-input" name="purchase_no" type="text"
                                            id="purchase_no">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Supplier Name </label>
                                        <select id="supplier_id" name="supplier_id" class="form-select select2"
                                            aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach($supplier as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-4 mt-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Category Name </label>
                                        <select name="category_id" id="category_id" class="form-select select2"
                                            aria-label="Default select example">
                                            <option selected="">Open this select menu</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-4 mt-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label">Product Name </label>
                                        <select name="product_id" id="product_id" class="form-select select2"
                                            aria-label="Default select example">
                                            <option selected="">Open this select menu</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <div class="md-3">
                                        <label for="example-text-input" class="form-label" style="margin-top:43px;">
                                        </label>
                                        <i
                                            class="btn btn-secondary btn-rounded waves-effect waves-light fas fa-plus-circle addeventmore">
                                            Add More</i>
                                    </div>
                                </div>
                            </div> <!-- // end row  -->
                        </div>
                        <div class="card-body">
                            <form action="{{ route('purchase.store') }}" method="post">
                                @csrf
                                <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Product Name </th>
                                            <th>PSC/KG</th>
                                            <th>Unit Price </th>
                                            <th>Description</th>
                                            <th>Total Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="AddRow" id="AddRow">

                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="5"></td>
                                            <td>
                                                <input type="text" class="form-control estimated_amount"
                                                    name="estimated_amount" id="estimated_amount" value="0" readonly
                                                    style="background-color: #ddd;">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table><br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" id="storeButton">Purchase Store</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    <script type="text/x-handlebars-template" id="document-template">
                    <tr class="delete_add_more_item" id="delete_add_more_item">
                        <input type="hidden" name="date[]" value="@{{ date }}">
                        <input type="hidden" name="purchase_no[]" value="@{{ purchase_no }}">
                        <input type="hidden" name="supplier_id[]" value="@{{ supplier_id }}">
                        <td>
                            <input type="hidden" name="category_id[]" value="@{{ category_id }}">
                            @{{ category_name }}
                        </td>
                        <td>
                            <input type="hidden" name="product_id[]" value="@{{ product_id }}">
                            @{{ product_name }}
                        </td>
                        <td>
                            <input type="number" min="1" class="form-control buying_qty text-right" name="buying_qty[]" value="">
                        </td>
                        <td>
                            <input type="number" class="form-control unit_price text-right" name="unit_price[]" value="">
                        </td>
                        <td>
                            <input type="text" class="form-control description text-right" name="description[]">
                        </td>
                        <td>
                            <input type="number" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly>
                        </td>
                        <td>
                            <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
                        </td>
                    </tr>
                </script>

    <script type="text/javascript">
        // Jab HTML document ready ho jaye tab andar wala code chalao
        $(document).ready(function () {

            // Add More class wale element par click hone par function chalega
            $(document).on("click", ".addeventmore", function () {

                // Date input se selected date lo
                var date = $('#date').val();

                // Purchase No input ki value lo
                var purchase_no = $('#purchase_no').val();

                // Supplier dropdown se selected supplier ki ID lo
                var supplier_id = $('#supplier_id').val();

                // Category dropdown se selected category ki ID lo
                var category_id = $('#category_id').val();

                // Selected category ka visible naam lo
                var category_name =
                    $('#category_id').find('option:selected').text();

                // Product dropdown se selected product ki ID lo
                var product_id = $('#product_id').val();

                // Selected product ka visible naam lo
                var product_name = $('#product_id').find('option:selected').text();


                // Check karo ke date select hui hai ya nahi
                if (date == '') {
                    $.notify("Date is required", { globalPosition: 'top right', className: 'error' });
                    // Isi function ko rok do
                    return false;
                }

                // Purchase No ki validation
                if (purchase_no == '') {
                    $.notify("Purchase No is required", { globalPosition: 'top right', className: 'error' });
                    return false;
                }

                // Supplier ki validation
                if (supplier_id == '') {
                    $.notify("Supplier is required", { globalPosition: 'top right', className: 'error' });
                    return false;
                }

                // Category ki validation
                if (category_id == '') {
                    $.notify("Category is required", { globalPosition: 'top right', className: 'error' });
                    return false;
                }

                // Product ki validation
                if (product_id == '') {
                    $.notify("Product Field is required", { globalPosition: 'top right', className: 'error' });
                    return false;
                }

                // HTML mein maujood template ka content read karo
                var source = $("#document-template").html();

                // Template ko aise function mein convert karo
                // jo data milne par HTML bana sake
                var tamplate = Handlebars.compile(source);

                // Template ko dene ke liye data object banao
                var data = {
                    // Object ki key : uski value
                    date: date,
                    purchase_no: purchase_no,
                    supplier_id: supplier_id,
                    category_id: category_id,
                    category_name: category_name,
                    product_id: product_id,
                    product_name: product_name
                };

                // Object ka data template mein daalo
                // aur complete HTML row hasil karo
                var html = tamplate(data);

                // Generated HTML ko AddRow tbody ke end mein add karo
                $("#AddRow").append(html);

            });

            // Remove icon par click hone par ye function chalega
            $(document).on("click", ".removeeventmore", function (event) {

                // Click ki gayi icon ki parent product row find karo
                // aur us row ko HTML se remove kar do
                $(this).closest(".delete_add_more_item").remove();

                // Remove hone ke baad invoice total dobara calculate karo
                totalAmountPrice();

            });

            // Unit Price ya Quantity input par click/key release hone par
            // us product ki total price calculate karo
            $(document).on('keyup click', '.unit_price,.buying_qty', function () {

                // Current row ka Unit Price hasil karo
                var unit_price = $(this).closest("tr").find("input.unit_price").val();

                // Current row ki Quantity hasil karo
                var qty = $(this).closest("tr").find("input.buying_qty").val();


                // Quantity ko Unit Price se multiply karo
                var total = unit_price * qty;


                // Current row ke Total Price input mein result rakho
                $(this).closest("tr").find("input.buying_price").val(total);


                // Tamam product rows ka total dobara calculate karo
                totalAmountPrice();

            });

            // Invoice ki saari rows ke Total Price ko add karne wala function
            function totalAmountPrice() {

                // Total zero se start karo
                var sum = 0;

                // Har buying_price class wale input par loop chalao
                $(".buying_price").each(function () {
                    // Current input ki value hasil karo
                    var value = $(this).val();

                    // Agar value number hai aur khaali nahi hai
                    // to usay sum mein add karo
                    if (!isNaN(value) && value.length != 0) {
                        sum += parseFloat(value);
                    }
                });

                // Final sum ko Estimated Amount input mein rakho
                $('#estimated_amount').val(sum);
            }
        });
    </script>

    <script type="text/javascript">

        $(function () {
            $(document).on('change', '#supplier_id', function () {
                var supplier_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-category') }}",
                    type: "GET",
                    data: { supplier_id: supplier_id },
                    success: function (data) {
                        var html = '<option value="">Select Category</option>';
                        $.each(data, function (key, v) {
                            html += '<option value=" ' + v.category_id + ' "> ' + v.category.name + '</option>';
                        });
                        $('#category_id').html(html);
                    }
                })
            });
        });


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