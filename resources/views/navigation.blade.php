<input type="checkbox" id="check">

<!-- HLAVNIČKA JAK NA MOBILU TAK NA PC STEJNÁ
____________________________________________________
!-->
<header>
    <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left-area">
        <a href="/"><h3> Otázkovač</h3></a>
    </div>

    <div class="right-area">
        @guest
             <a href="{{ route('login') }}" class="logout_btn"> Přihlásit se </a>
                
            @if (Route::has('register'))

            <a href="{{ route('register') }}" class="logout_btn2"> Registrovat se </a>
                
            @endif
        @endguest

        @auth
        <a class="logout_btn" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         {{ __('Odhlásit se') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth

    </div>

</header>

<!-- ____________________________________________________ 
    KONEC HLAVIČKY
 -->

 <!-- 
    MOBILNÍ NAVIGACE
    ____________________________________________________ 
 -->
<div class="mobile_nav">
    <div class="nav_bar">
        @auth
    <h3> {{auth()->user()->name }}</h3>
        @endauth

        @guest
        <h3> Přihlašte se </h3>
        @endguest

            <i class="fas fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_item">
            <a href="/"> <i class="fas fa-home"></i> <span> Homepage </span> </a>
            <a href="/home"> <i class="fas fa-lock"></i> <span> Moje otázky </span> </a>
            <a href="/public"> <i class="fas fa-globe-europe"></i> <span> Veřejné otázky </span> </a>
            <a href="#"> <i class="fas fa-user-alt"></i> <span> Profil </span> </a>
    </div>
</div>

<!-- ____________________________________________________ 
   KONEC MOBILNÍ NAVIGACE
 -->


 
 <!-- NAVIGACE BOČNÍ PC 
    ____________________________________________________ 

--> 

<div class="sidebar">
    <div class="profile-info"> 
            @auth
            <h4> {{auth()->user()->name }}</h4>
            @endauth

            @guest
            <h4> Nejste přihlášený </h4>
            @endguest
    </div>
    
    <a href="/"> <i class="fas fa-home"></i> <span> Homepage </span> </a>
    <a href="/home"> <i class="fas fa-lock"></i> <span> Moje otázky </span> </a>
    <a href="/public"> <i class="fas fa-globe-europe"></i> <span> Veřejné otázky </span> </a>
    <a href="#"> <i class="fas fa-user-alt"></i> <span> Profil </span> </a>
</div>

<!-- 
____________________________________________________ 
KONEC NAVIGACE BOČNÍ PC 
-->




<!-- Navigace 
<nav class="main-navigation">
        <div class="main-navigation__links"> 
   
 

    <a href="/">Hlavní stránka</a>

    @guest

            <a href="{{ route('login') }}">Přihlásit se</a>
    
        @if (Route::has('register'))

            <a href="{{ route('register') }}">Zaregistrujte se</a>

        @endif
    
    @endguest
    
    
    
    @auth
        
    <a href="/home">
    <strong> {{auth()->user()->name}}</strong>
    </a>
    
    
    <a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
     {{ __('Logout') }}
 </a>

 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
     @csrf
 </form>
    @endauth

</div>
    
    </nav>

-->