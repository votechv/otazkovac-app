@extends('layouts.offline')

@section('title', 'zaregistrujte se')


@section('content')


<div class="login-page">
    <div class="login-page__wrap">
        <div class="login-page__left">
            <h2>Nazdárek 👋</h2>
            <p>Pokud už na Knowli svůj účet máš, můžeš se přihlásit tady.</p>
            <a href="/login"> <button> Přihlásit se</button></a>
        </div>
    
        <div class="login-page__right">
            <h2> Zaregistruj se </h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

          

             
                        <input placeholder="Jméno" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
          

          

              
                        <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
          
          

               
                        <input placeholder="Heslo" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
          

           
                        <input placeholder="Heslo znovu" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        

               
                        <button type="submit" class="btn btn-primary btn-register">
                            {{ __('Registrovat') }}
                        </button>
        
            </form>
        </div>
    </div>
    </div>


@endsection
