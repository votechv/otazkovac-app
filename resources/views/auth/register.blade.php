@extends('layouts.body')

@section('title', 'zaregistrujte se')


@section('content')
<div class="loginform">

        <div class="loginform__wrap"> 
                <h2> Zaregistrujte se </h2>

          
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
                

                       
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrovat') }}
                                </button>
     </div>                        
</div>

@endsection
