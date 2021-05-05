@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> {{ isset($url) ? ucwords($url) : '' }} {{ __('Register') }}</div>
                    @include('flash::message')
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.edit', $user->id) }}"
                            aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $user->name }}" autocomplete="name" autofocus required
                                        data-parsley-trigger="keyup">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ $user->email }}" autocomplete="email" required
                                        data-parsley-type="email" data-parsley-trigger="keyup">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="mobile">{{ __('Mobile') }}</label>
                                    <input id="mobile" type="number"
                                        class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                        value="{{ $user->mobile }}" autocomplete="mobile" autocomplete="mobile" autofocus
                                        required data-parsley-trigger="keyup" required
                                        parsley-regexp="^\(?(?:\+?61|0)4\)?(?:[ -]?[0-9]){2}\)?(?:[ -]?[0-9]){5}[0-9]$">

                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date-of-birth">{{ __('Date of Birth') }}</label>
                                    <input id="date_of_birth" type="date"
                                        class="form-control @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth" value="{{ $user->date_of_birth }}"
                                        autocomplete="date_of_birth" required data-parsley-trigger="keyup">

                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="profile_picture">{{ __('Profile Picture') }}</label>
                                    <input id="profile_picture" type="file"
                                        class="form-control @error('profile_picture') is-invalid @enderror"
                                        name="profile_picture" value="{{ old('profile_picture') }}"
                                        onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                                    @error('profile_picture')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <img id="blah"
                                    src="{{ asset(PROFILE_PICTURE_IMAGE_URL . '/' . $user->id . '/' . $user->profile_picture) }}"
                                    width="60" height="60" />
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
