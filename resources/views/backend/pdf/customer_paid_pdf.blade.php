@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Customer Paid Report</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                <li class="breadcrumb-item active">Customer Paid Report</li>
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
                                        <h3>
                                            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo"
                                                height="24" />
                                            <span style="font-size: 18px;">Easy Shopping Mall</span>
                                        </h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 mt-4">
                                            <address>
                                                <strong>Easy Shopping Mall:</strong><br>
                                                Puran Pulton<br>
                                                support@email.com
                                            </address>
                                        </div>
                                        <div class="col-6 mt-4 text-end">
                                            <address>

                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="8%"><strong>Sl</strong></th>
                                                            <th width="23%" class="text-center"><strong>Customer Name</strong></th>
                                                            <th width="23%" class="text-center"><strong>Invoice No</strong></th>
                                                            <th width="23%" class="text-center"><strong>Date</strong></th>
                                                            <th width="23%" class="text-center"><strong>Due Amount</strong></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $total_due = '0';
                                                        @endphp
                                                        @foreach ($allData as $key => $item)
                                                            <tr>
                                                                <td> {{ $key + 1}} </td>
                                                                <td class="text-center"> {{ $item['customer']['name'] }} </td>
                                                                <td class="text-center"> #{{ $item['invoice']['invoice_no'] }} </td>
                                                                <td class="text-center"> {{ date('d-m-Y', strtotime($item['invoice']['date'])) }} </td>
                                                                <td class="text-center"> {{ $item['due_amount'] }} </td>
                                                            </tr>
                                                            @php
                                                                $total_due += $item['due_amount'];
                                                            @endphp
                                                        @endforeach
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Grand Due Total</strong>
                                                            </td>
                                                            <td class="no-line text-center">
                                                                <h4 class="m-0">${{ $total_due }}</h4>
                                                            </td>
                                                        </tr>
                                                        <tr class="no-pdf d-print-none">
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

                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection