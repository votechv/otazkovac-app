@extends('layouts.body')

@section('title', 'přihlásit se')

@section('content')

<div class="loginform">

    <div class="loginform__wrap"> 

              <h2> Přihlásit se</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                


                                <input placeholder="Heslo" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                

                            <div class="remember_me"> 
                                    <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                   <p> Zapamatuj si mě </p>
                            </div>

                  
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="password-forgot" href="{{ route('password.request') }}">
                                        {{ __('Zapomenuté heslo?') }}
                                    </a>
                                @endif

    </div>
</div>
@endsection
