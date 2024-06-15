@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <form>
                        @csrf
                        <div class="row">
                            <div class="container px-3 py-2">
                                <div class="form-group mb-3 text-center">
                                    <div class="h2">Change Password</div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="password" class="form-label">{{ __('New Password') }}</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key-fill"></i></span>
                                        <input id="password" type="password" class="form-control @error('username') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="username" aria-describedby="addon-wrapping" autofocus>
                                    </div>
                                    
                                    @error('password')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="confirm_password" class="form-label">{{ __('Confirm Password') }}</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key-fill"></i></span>
                                        <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required autocomplete="current-password" aria-describedby="addon-wrapping">
                                    </div>
                                @error('confirm_password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <button type="submit" class="btn btn-dark w-100">
                                        {{ __('Change') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
