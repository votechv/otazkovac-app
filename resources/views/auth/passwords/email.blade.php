@extends('layouts.offline')

@section('title', 'resetovat heslo ')

@section('content')

<div class="login-page">
    <div class="login-page__wrap">
        <div class="login-page__left">
            <h2>Hlavu vzhůru!</h2>
            <p>Kdyby si si na své údaje vzpomněl, přihlásit se můžeš tady.</p>
            <a href="/login"> <button>Přihlásit se</button> </a>
        </div>
    
        <div class="login-page__right">
            <h2> Resetuj si své heslo! </h2>
            <form  style="max-width: 300px;" method="POST" action="{{ route('password.email') }}">
                @csrf

   
                    <label for="email" >{{ __('Zadejte email') }}</label>

                 
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                   
              

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary btn-register">
                            {{ __('Odeslat') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>

@endsection
