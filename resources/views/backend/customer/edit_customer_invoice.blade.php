@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Customer Invoice</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                <li class="breadcrumb-item active">Edit Customer Invoice</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" id="invoiceTable">

                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">
                                        <a href="{{ route('credit.customer') }}"
                                            class="btn btn-dark btn-rounded waves-effect waves-light"
                                            style="float:right;"><i class="fa fa-list"> Back </i></a>
                                        <h3>
                                            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo"
                                                height="24" />
                                            <span style="font-size: 18px;">Easy Shopping Mall</span>
                                        </h3>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>Customer Invoice ( Invoice No :
                                                    {{ $payment['invoice']['invoice_no'] }} )</strong></h3>
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>Customer Name</strong></td>
                                                            <td class="text-center"><strong>Customer Mobile</strong></td>
                                                            <td class="text-center"><strong>Address</strong></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <p>{{ $payment['customer']['name']  }}
                                                            </td>
                                                            <td class="text-center">
                                                                <p>{{ $payment['customer']['mobile_no']  }}
                                                            </td>
                                                            <td class="text-center">
                                                                <p>{{ $payment['customer']['email']  }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <form method="post" action="{{ route('customer.update.invoice', $payment->invoice_id) }}">
                                        @csrf
                                        <div>
                                            <div class="p-2">
                                            </div>
                                            <div class="">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <td><strong>Sl</strong></td>
                                                                <td class="text-center"><strong>Category</strong></td>
                                                                <td class="text-center"><strong>Product Name</strong></td>
                                                                <td class="text-center"><strong>Current Stock</strong></td>
                                                                <td class="text-center"><strong>Quantity</strong></td>
                                                                <td class="text-center"><strong>Unit Price</strong></td>
                                                                <td class="text-center"><strong>Total Price</strong></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $total_sum = '0';
                                                                $invoice_details = App\Models\InvoiceDetail::where('invoice_id', $payment->invoice_id)->get();
                                                            @endphp
                                                            @foreach ($invoice_details as $key => $details)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td class="text-center">{{ $details['category']['name'] }}
                                                                    </td>
                                                                    <td class="text-center">{{ $details['product']['name'] }}
                                                                    </td>
                                                                    <td class="text-center">
                                                                        {{ $details['product']['quantity'] }}
                                                                    </td>
                                                                    <td class="text-center">{{ $details['selling_qty'] }}</td>
                                                                    <td class="text-center">{{ $details['unit_price'] }}</td>
                                                                    <td class="text-center">{{ $details['selling_price'] }}</td>
                                                                </tr>
                                                                @php
                                                                    $total_sum += $details->selling_price;
                                                                @endphp
                                                            @endforeach
                                                            <tr>
                                                                <td class="thick-line"></td>
                                                                <td class="thick-line"></td>
                                                                <td class="thick-line"></td>
                                                                <td class="thick-line"></td>
                                                                <td class="thick-line"></td>
                                                                <td class="thick-line text-center">
                                                                    <strong>Subtotal</strong>
                                                                </td>
                                                                <td class="thick-line text-center">${{ $total_sum }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line text-center">
                                                                    <strong>Discount Amount</strong>
                                                                </td>
                                                                <td class="no-line text-center">
                                                                    ${{ $payment['discount_amount'] }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line text-center">
                                                                    <strong>Paid Amount</strong>
                                                                </td>
                                                                <td class="no-line text-center">
                                                                    ${{ $payment['paid_amount'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line text-center">
                                                                    <strong>Due Amount</strong>
                                                                    <input type="hidden" name="new_paid_amount" id="new_paid_amount" value="{{ $payment['due_amount'] }}">
                                                                </td>
                                                                <td class="no-line text-center">
                                                                    ${{ $payment['due_amount'] }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line text-center">
                                                                    <strong>Grand Total</strong>
                                                                </td>
                                                                <td class="no-line text-center">
                                                                    <h4 class="m-0">${{ $payment['total_amount'] }}</h4>
                                                                </td>
                                                            </tr>
                                                            <tr class="no-pdf d-print-none">
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="text-center">
                                                                    <a href="javascript:window.print()"
                                                                        class="btn btn-success waves-effect waves-light"><i
                                                                            class="fa fa-print"></i></a>
                                                                    <button onclick="downloadPDF()"
                                                                        class="btn btn-primary waves-effect waves-light ms-2">Download</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>Paid Status</label>
                                                <select name="paid_status" id="paid_status" class="form-select">
                                                    <option value="">Select Status</option>
                                                    <option value="full_paid">Full Paid</option>
                                                    <option value="partial_paid">Partial Paid</option>
                                                </select>
                                                <input type="number" name="paid_amount" id="paid_amount"
                                                    class="form-control paid_amount mt-3" style="display: none;"
                                                    placeholder="Paid Amount">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="example-text-input" class="form-label">Date</label>
                                                <input class="form-control example-date-input" name="date" type="date"
                                                    id="date" placeholder="YY-MM-DD">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <div class="md-3" style="padding-top: 30px;">
                                                    <button type="submit" class="btn btn-info">
                                                        Invoice Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection