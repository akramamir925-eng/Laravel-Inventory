@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Daily Invoice Report</h4><br><br>
                            <form action="{{ route('daily.invoice.pdf') }}" method="GET" target="_blank" id="dailyReport">
                                <div class="row align-content-center">
                                    <div class="col-md-4">
                                        <div class="md-3 form-group">
                                            <label for="example-text-input" class="form-label">Start Date</label>
                                            <input class="form-control example-date-input" type="date" placeholder="YY-MM-DD" name="start_date"  id="start_date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-3 form-group">
                                            <label for="example-text-input" class="form-label">End Date</label>
                                            <input class="form-control example-date-input" type="date" placeholder="YY-MM-DD" name="end_date"  id="end_date">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-3 form-group">
                                            <label for="example-text-input" class="form-label" style="margin-top: 43px;"></label>
                                            <button type="submit" class="btn btn-info">Search</button>
                                        </div>
                                    </div>
                                </div> <!-- // end row  -->
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection