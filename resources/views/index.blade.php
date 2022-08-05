@extends('layouts.body')

@section('title', 'hlavní stránka')

@section('content')


    

<div class="hp-top">
    <div class="hp-top__content">
        <div class="hp-top__content-left
        @auth
        left-auth-ok
    @endauth
        ">
                @guest
            <h2> Bezplatný a zábavný způsob jak otestovat své vědomosti</h2>
            <p> Potřebujete se nechat vyzkoušet na zítřejší test? Nebo chcete s přáteli hrát některou z poznávacích her, ale nevíte na jaké otázky se ptát? Otázkovač vám pomůže!  </p>
           <div class="hp-buttons"> 
            <a href="/register"><button class="start"> Začít </button></a>
            <a href="/login"><button> Již mám účet</button></a>
        </div>
            @endguest

            @auth
        <h1>  
            <?php
            $time = date("H");
           
            $timezone = date("e");
            
            if ($time < "9") {
                echo "Dobré ráno!";
            } else

            if ($time >= "9"  && $time < "12") {
                echo "Dobré dopoledne!";
            } else
           
            if ($time >= "12" && $time < "17") {
                echo "Dobré odpoledne!";
            } else
            
            if ($time >= "17" && $time < "19") {
                echo "Dobrý podvečer!";
            } else
            
           
            if ($time >= "19") {
                echo "Dobrý večer!";
            }

            ?>
          <p> Teď je ten správný čas na procvičování vašich otázek! :) </p>
      
    
         </h1>   
 
        @foreach ($plantimes as $item)
            <?php echo $item->name?>
        @endforeach
            @endauth
        </div>

        <div class="hp-top__content-right
        @auth
        img-auth-ok
        @endauth
        " >
            <img src="https://vojtechvanek.com/comp-otazkovac.png" alt="imac">
        </div>
    </div>
</div>



           
 <div class="wrap-content-index">   
     <h2 class="main"> Naše balíčky pro vás</h2>
     <div class="wrap-content-index__content">     
<h2 class="title"> Jazyky 🇬🇧</h2>
    <div class="indexpackage package-height">  
        <div class="indexpackage__wrap wrap-border"> 
                    
            @foreach ($packages as $package)
            @if ($package->user_id === 1 && $package->category == "anj")
            
            <div class="indexpackage__single">
            <h2> {{$package->name}} </h2>
            <p> {{$package->text}} </p>
            <div class="indexpackage__content">
                <div class="indexpackage__content__middle"> 
                    @auth
                    <a href="/package/{{$package->id}} "> <i class="fas fa-play"></i> </a>
                    @endauth
                    @guest
                    <a href="/locked-package"> <i class="fas fa-eye"></i> </a>    
                    @endguest
                </div>
            </div>
        </div>
    @endif
    @endforeach
   
        </div>
    </div>

    <h2 class="title"> Zábava 🤪 </h2> 

<div class="indexpackage package-height">  
    <div class="indexpackage__wrap"> 
        @foreach ($packages as $package)
        @if ($package->user_id === 1 && $package->category == "fun")

        <div class="indexpackage__single">
        <h2 > {{$package->name}} </h2>
        <p> {{$package->text}} </p>
        <div class="indexpackage__content">
            <div class="indexpackage__content__middle"> 
                    @auth
                    <a href="/package/{{$package->id}} "> <i class="fas fa-play"></i> </a>
                    @endauth
                    @guest
                    <a href="/locked-package"> <i class="fas fa-eye"></i> </a>    
                    @endguest            </div>
        </div>
        </div>
        @endif
        @endforeach

    </div>
</div>




</div> 
</div>   


<div class="hp-top">
        <div class="hp-top__content">
            <div class="hp-top__center">
                    <h2> A mnoho dalších </h2>
                   <a href="/public"> <h2> <i class="fas fa-forward"></i></h2></a>

            </div>
        </div>
    </div>


@endsection
