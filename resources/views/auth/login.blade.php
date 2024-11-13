@extends('layouts.app')

@section('content')
<div class="container">
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <p class="head_title ">My Coworking Reserve</p>
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div data-mdb-input-init class="form-outline mb-4">
                  <input type="email" id="email" class="form-control form-control-lg" name="email"
                    placeholder="Enter a valid email address" />
                  <label class="form-label" for="email">{{ __('Correo')}}</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-3">
                  <input type="password" id="password" name="password" class="form-control form-control-lg"
                    placeholder="Enter password" />
                  <label class="form-label" for="password">{{ __('Contraseña')}}</label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                  <!-- Checkbox -->
                  <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                        {{ __('Recordarme')}}
                    </label>
                  </div>
        <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Olvido su contraseña?') }}
                            </a>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('Login')}}</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">{{ __('No tiene una cuenta ahora?')}} <a href="{{ route('register') }}"
                      class="link-danger">{{ __('Registro')}}</a></p>
                </div>

              </form>
            </div>
          </div>
        </div>
        <div
          class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
          <!-- Copyright -->
          <div class="text-white mb-3 mb-md-0">
            {{ __('Copyright © 2024. All rights reserved.')}}
          </div>
          <!-- Copyright -->
        </div>
    </section>
</div>
@endsection
