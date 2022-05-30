<input type="checkbox" id="check">

<!-- HLAVNIČKA JAK NA MOBILU TAK NA PC STEJNÁ! -->
<header>

  

    <div class="right-area">
        @guest
        <div class="log-reg">

               <a href="{{ route('login') }}"> <button class="log-reg-btn"> Přihlásit se  </button></a>

               
        @if (Route::has('register'))

        <a <a href="{{ route('register') }}"><button class="log-reg-btn register-link"> Registrovat se </button></a>
               
        @endif
            
        </div>
        @endguest

        @auth

        <div class="drop-down">
            <button class="header-btn"> <i class="far fa-user paddingright"></i> {{auth()->user()->name }} <i class="fas fa-chevron-down"></i> </button>
            <div class="drop-down__content"> 
                <a  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Odhlásit se') }}
                </a>
              
            </div>

        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth

    </div>

</header>

<!-- KONEC HLAVIČKY-->

 <!-- MOBILNÍ NAVIGACE -->
<div class="mobile_nav">
    <div class="nav_bar">
      
   <h3><a href="/"> Otázkovač.cz </a> </h3> 
      

            <i class="fas fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_item">
            <a href="/"> <i class="fas fa-home"></i> <span> Homepage </span> </a>
           @auth
            <a href="/home"> <i class="fas fa-lock"></i> <span> Moje otázky </span> </a>
            <a href="/public-package"> <i class="fas fa-globe-europe"></i> <span> Veřejné otázky </span> </a>
            <a href="/profil"> <i class="fas fa-user-alt"></i> <span> Profil </span> </a>
           @endauth

            @guest
            <a href="{{ route('login') }}"> <i class="fas fa-sign-in-alt"></i> <span> Přihlásit se </span> </a>
            <a href="{{ route('register') }}"><i class="fas fa-plus"></i> <span> Registrovat se </span> </a>
            @endguest
            
            @auth
            <a  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Odhlásit se 
                </a>
                @endauth
            </div>
           
</div>

<!-- KONEC MOBILNÍ NAVIGACE-->


 
 <!-- NAVIGACE BOČNÍ PC --> 

<div class="sidebar">
    <div class="profile-info">     
           <h4><a href="/">  Otázkovač <span class="beta"> BETA </span> </a></h4> 
    </div>
    
    <a href="/"> <i class="fas fa-home"></i> <span> Homepage </span> </a>
    <a href="/home"> <i class="fas fa-lock"></i> <span> Moje otázky </span> </a>
    <a href="/public-package"> <i class="fas fa-globe-europe"></i> <span> Veřejné otázky </span> </a>
    
    <div class="sidebar__down">
        <a href="/profil"> <i class="fas fa-user-alt"></i> <span> Profil </span> </a>
        <a href="/navod"> <i class="fas fa-book-open"></i> <span> Návod </span> </a>
        <a href="/scheduled"> <i class="far fa-calendar-plus"></i> Plánované funkce </span> </a>
    </div>

</div>

<!-- KONEC NAVIGACE BOČNÍ PC -->



