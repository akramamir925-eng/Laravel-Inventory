@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card align-items-center mb-0 px-3 py-4">
                        <img class="avatar-xl  rounded-circle" src="{{ (!empty ($userData->profile_image)) ? url('upload/admin_images/' . $userData->profile_image) : url('upload/no_image.jpg') }}" alt="Card image cap">
                        <br>
                        <div class="card-body w-100">
                            <h4 class="card-title">Name : {{ $userData->name }}</h4>
                            <hr>
                            <h4 class="card-title">Email : {{ $userData->email }}</h4>
                            <hr>
                            <h4 class="card-title">User name : {{ $userData->username }}</h4>
                            <hr>
                            <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light px-4 py-2 mt-2">Edit Profile</a>
                        </div>
                    </div>

                </div>
            </div>
        </div> 
    </div>

@endsection