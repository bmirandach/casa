@extends('layouts.app')

@section('content')
<div class="sesion">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!--<div class="card">
                <div class="form-horizontal form-signin">-->
                <h2 class="form-signin-heading">{{ __('Registrate') }}</h2>

                <!--<div class="card-body">-->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <!--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>-->

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Nombre" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <!--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>-->

                            <div class="col-md-6">
                                <input id="casa" type="text" placeholder="Id de la casa" class="form-control{{ $errors->has('casa') ? ' is-invalid' : '' }}" name="casa" value="{{ old('casa') }}" required>

                                @if ($errors->has('casa'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('casa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <!--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <!--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>-->

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Contraseña" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <!--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>-->

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" placeholder="Confirmar contraseña" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Registrarme') }}
                                </button>
                            </div>
                        </div>
                    </form>
                <!--</div>
                </div>-->
            <!--</div>-->
        </div>
    </div>
</div>
@endsection