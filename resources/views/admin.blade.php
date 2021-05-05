@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        Hi Admin! </br>
                        <a href="{{ url('admin/user/register') }}">User Registration</a>
                        </br>
                        <a href="{{ url('admin/user/list') }}">User List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
