<input type="checkbox" id="check">

<!-- HLAVNIČKA JAK NA MOBILU TAK NA PC STEJNÁ! -->

<header class="topmenu">
<input type="text" placeholder="Hledej..."><button> <i class="fa-solid fa-magnifying-glass"></i> </button>

    <div class="topmenu__user">
        <ul>
            <li><img src="/cdn/profile-picture.png"> <div class="topmenu__userinfo"> <span class="topmenu__name"> Vojtěch Vaněk </span> <span class="topmenu__position"> Uživatel </span> </div>
                <ul class="topmenu__submenu">
                    <li> <a href="#"> Nastavení</a></li>
                    <li> <a href="#"> Návod</a></li>
                    <li> <a href="#"> Odhlásit se </a></li>
                </ul>
            </li>
        </ul>


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

<nav class="mainmenu">
   <div class="mainmenu__logo">
    <img src="/cdn/otazkovac.png" alt="">
   </div>

   <div class="mainmenu__links">
       <ul>
           <li>
               <a href="/dashboard"> <i class="fa-solid fa-chart-line"></i> Můj přehled </a>
           </li>
           <li>
               <a href="/studyroom"> <i class="fa-solid fa-calendar-days"></i>Plánovač </a>
           </li>
           <li>
               <a href="/studyroom"> <i class="fa-solid fa-graduation-cap"></i> Studovna </a>
           </li>
          
           <li>
            <a href="/home"> <i class="fa-solid fa-question"></i> Moje balíčky </a>
            </li>
        <li>
            <a href="/public-packages"> <i class="fa-solid fa-clipboard-question"></i>Veřejné balíčky </a>
        </li>

        <li>
            <a href="/setting"><i class="fa-solid fa-gear"></i> Nastavení </a>
        </li>

        <li>
            <a href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i> Odhlásit se  </a>
        </li>


       </ul>
   </div>
</nav>

<!-- KONEC NAVIGACE BOČNÍ PC -->



