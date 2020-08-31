@extends('layouts.master')

@section('title', 'BulSU PPESO')
    
{{-- @endsection --}}

@section('body')
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('home') }}"><b>BulSU</b> PPESO</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="text" name="email" class="form-control {{ $errors->has('employee_id') || $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('employee_id') ?: old('email') }}" placeholder="Email" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if ($errors->has('employee_id') || $errors->has('email'))
            <div class="invalid-feedback">
                {{ $errors->first('employee_id') ?: $errors->first('email') }}
            </div>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
            placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @if ($errors->has('password'))
          <div class="invalid-feedback">
            {{ $errors->first('password') }}
          </div>
          @endif
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">{{ __('Remember Me') }}</label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">
              {{ __('Login') }}
            </button>
          </div>
        </div>
      </form>

      <p class="mb-1">
        <a href="{{ route('password.request') }}"> {{ __('Forgot Your Password?') }}</a>
      </p>
      {{-- <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
      </p> --}}
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection