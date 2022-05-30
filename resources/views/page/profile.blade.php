@extends('layouts.body')

@section('title', 'profil')

@section('content')

<div class="profile-main">
    <div class="profile-main__content"> 
        <div class="profile-main__image"> 
             <img src="./cdn/user-profile.png" alt="user">
         </div>
         <div class="profile-main__content-text"> 
            <h2> {{auth()->user()->name}} </h2>
            <h4> uživatel </h4>
            <div class="user-from_content">
                <p class="user-from"> Uživatelem od {{auth()->user()->created_at->format('d.m.Y')}} </p>
                <p class="user-from email-text"> {{auth()->user()->email}} </p>
            </div>

            <div class="profile-main__packages">

                <div class="profile-main__packages__single"> 

                  
                    <p>  {{ $balicek = auth()->user()->package->count()}} <br>  
                        @if ($balicek == 0)
                            balíčků
                        @endif
                        
                        @if ($balicek == 1)
                        balíček
                        @endif

                        @if ($balicek == 2 or $balicek == 3 or $balicek == 4)
                        balíčky
                        @endif

                        @if ($balicek > 4)
                        balíčků
                        @endif
                    
                    </p>
                </div>

                <div class="profile-main__packages__single"> 
                    <p> {{$otazky = auth()->user()->question->count()}} <br> 
                    
                        @if ($otazky == 0)
                        otázek
                    @endif
                    
                        @if ($otazky == 1)
                        otázka
                        @endif

                        @if ($otazky == 2 or $otazky == 3 or $otazky == 4)
                        otázky
                        @endif

                        @if ($otazky > 4)
                        otázek
                        @endif
                    </p>
                </div>  

            </div>
         </div>
    </div>
</div>
@endsection