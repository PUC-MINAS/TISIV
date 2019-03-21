@extends('layouts.base')

@section('content-base')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-8">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                <div class="col">
                <div class="p-5">
                    <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Instituto Sacramentino de Nossa Senhora</h1>
                    </div>
                    <form class="user" method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                        id="email" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ old('email') }}"
                         required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user {{ $errors->has('password') ? ' is-invalid' : '' }}"
                         id="password" name="password" placeholder="Senha" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                        <input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">Remember Me</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                    
                    </form>
                    
                    <div class="text-center">
                        @if (Route::has('password.request'))
                            <a class="small" href="{{ route('password.request') }}">
                                Esqueceu sua senha?
                            </a>
                        @endif
                    </div>
                    
                </div>
                </div>
            </div>
            </div>
        </div>

        </div>

    </div>

</div>
@endsection
