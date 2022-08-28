@extends('layouts.offline')

@section('title', 'přihlásit se')

@section('content')


<div class="login-page">
<div class="login-page__wrap">
    <div class="login-page__left">
        <h2>Ahoj 👋</h2>
        <p> Nemáš ještě svůj účet na Knowli? Tak se zaregistruj!</p>
        <a href="/register"> <button> Registrovat se</button> </a>
    </div>

    <div class="login-page__right">
        <h2> Přihlaš se </h2>
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


      <div class="login-page__remember"> 
              <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

             <p> Zapamatuj si mě </p>
      </div>


          <button type="submit" class="btn btn-primary">
              {{ __('Přihlásit se') }}
          </button>

          @if (Route::has('password.request'))
              <a class="login-page__resetpsw" href="{{ route('password.request') }}">
                  {{ __('Zapomenuté heslo?') }}
              </a>
          @endif
    
        </form>
    </div>
</div>
</div>


@endsection
