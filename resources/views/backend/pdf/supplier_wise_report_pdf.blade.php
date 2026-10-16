@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Supplier Wise Stock Report</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                <li class="breadcrumb-item active">Supplier Wise Stock Report</li>
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
                                    </div>
                                </div>
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <h3 class="text-center mb-4"><strong>Supplier Name :</strong> {{ $allData['0']['supplier']['name'] }}</h3>
                                                <table class="table" width="100%" style="table-layout: fixed;">
                                                    <thead>
                                                        <tr>
                                                            <td width="5%"><strong>Sl</strong></td>
                                                            <td class="text-center"><strong>Supplier Name</strong></td>
                                                            <td class="text-center"><strong>Unit</strong></td>
                                                            <td class="text-center"><strong>Category</strong></td>
                                                            <td class="text-center"><strong>Product Name</strong></td>
                                                            <td class="text-center"><strong>Stock</strong></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($allData as $key => $item)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td class="text-center">{{ $item['supplier']['name'] }}</td>
                                                                <td class="text-center">{{ $item['unit']['name'] }}</td>
                                                                <td class="text-center">{{ $item['category']['name'] }}</td>
                                                                <td class="text-center">{{ $item['name'] }}
                                                                <td class="text-center">{{ $item['quantity'] }}
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        <tr class="no-pdf">
                                                            <td colspan="4">
                                                                @php
                                                                    $date = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
                                                                @endphp
                                                                <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>
                                                            </td>
                                                            <td class="no-line"></td>
                                                            <td class="text-center">
                                                                <a href="javascript:window.print()"
                                                                    class="btn btn-success waves-effect waves-light  d-print-none"><i
                                                                        class="fa fa-print"></i></a>
                                                                <button onclick="downloadPDF()"
                                                                    class="btn btn-primary waves-effect waves-light ms-2  d-print-none">Download</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="mt-3 cust-pagination">
                                                    {{ $allData->links('pagination.cust-pagination') }}
                                                </div>
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