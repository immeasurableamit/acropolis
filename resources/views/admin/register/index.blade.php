@extends('layouts.auth')

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> {{ isset($url) ? ucwords($url) : '' }} {{ __('Registration Details') }}
                        <a href="{{ route('register') }}"><button class="float-right btn btn-primary">Add
                                User</button></a>
                    </div>

                    @include('flash::message')

                    <div class="alert alert-danger" role="alert" id="success" style="display: none"></div>

                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($users as $user)
                                    <tr id="user_id_{{ $user->id }}">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>
                                            <a href="{{ url('admin/user/details/' . $user->id) }}"><button
                                                    class="btn btn-primary">View Details</button></a>

                                            <a href="{{ url('admin/user/edit/' . $user->id) }}"><button
                                                    class="btn btn-primary">Edit</button></a>



                                            <a href="javascript:void(0)" id="delete-user" data-id="{{ $user->id }}"
                                                class="btn btn-danger delete-user"
                                                onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                        </td>


                                        </td>
                                    </tr>
                                @empty
                                    <p>No users</p>
                                @endforelse

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.delete-user', function() {
                var user_id = $(this).data("id");

                $.ajax({
                    type: "DELETE",
                    url: "{{ url('admin/user/delete') }}" + '/' + user_id,
                    success: function(data) {
                        $("#success").show().text(data.success);
                        $("#user_id_" + user_id).remove();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });
        });

    </script>
@endsection
