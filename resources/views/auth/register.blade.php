@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label
                                for="name"
                                class="col-md-4 col-form-label text-md-right"
                            >{{ __('Name') }}
                            </label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <svg class="c-icon">
                                                <use
                                                    xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"
                                                >
                                                </use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    autocomplete="name"
                                    autofocus>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                            for="email"
                            class="col-md-4 col-form-label text-md-right"
                            >{{ __('E-Mail Address') }}
                            </label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <svg class="c-icon">
                                                <use
                                                xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-envelope-open')}}"
                                                >
                                                </use>
                                            </svg>
                                        </span>
                                    </div>
                                    <input
                                    id="email"
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email">
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                for="website"
                                class="col-md-4 col-form-label text-md-right"
                                >{{ __('Website') }}
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg class="c-icon">
                                                    <use
                                                        xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-browser')}}"
                                                    >
                                                    </use>
                                                </svg>
                                            </span>
                                        </div>

                                        <input
                                        id="website"
                                        type="text"
                                        class="form-control @error('website') is-invalid @enderror"
                                        name="website"
                                        value="{{ old('website') }}">
                                    </div>
                                    @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                for="password"
                                class="col-md-4 col-form-label text-md-right"
                                >{{ __('Password') }}
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg class="c-icon">
                                                    <use
                                                    xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"
                                                    >
                                                    </use>
                                                </svg>
                                            </span>
                                        </div>
                                            <input
                                            id="password"
                                            type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password"
                                            required
                                            autocomplete="new-password">
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                    for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right"
                                    >{{ __('Confirm Password') }}
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <svg class="c-icon">
                                                        <use
                                                        xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-lock-locked')}}"
                                                        >
                                                        </use>
                                                    </svg>
                                                </span>
                                            </div>
                                                <input
                                                id="password-confirm"
                                                type="password"
                                                class="form-control"
                                                name="password_confirmation"
                                                required
                                                autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                            <a
                                            class="ml-2"
                                            href="{{ route('login') }}"
                                            >
                                            {{__('New User')}}
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
