<!DOCTYPE html>
<html lang="en">
<head>
    @include("include.meta")
    @include("include.css")
</head>
<body>
    @include('include.header')
    <div class="container">
        <br/>
        <div class="card-header">{{ __('Register') }}</div><br/><br/>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
                <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                <div class="col-md-6">
                    <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firsname') }}" required>
                    @if ($errors->has('firstname'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('firstname') }}</strong>
                        </span>
                    @endif
                </div><br/><br/>

                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                <div class="col-md-6">
                    <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required>
                    @if ($errors->has('lastname'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                    @endif
                </div><br/><br/>

                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                <div class="col-md-6">
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>
                    @if ($errors->has('username'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div><br/><br/>

                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                <div class="col-md-6">
                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div><br/><br/>

                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div><br/><br/>

                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Password Confirmation') }}</label>
                <div class="col-md-6">
                    <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div><br/><br/>
            </div>
            
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
    @include('include.footer')
</body>
</html>
@include("include.js")
