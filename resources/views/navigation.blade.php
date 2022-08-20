<!-- <input type="checkbox" id="check">

 HLAVNIČKA JAK NA MOBILU TAK NA PC STEJNÁ! 

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
               <a href="/scheduled"> <i class="fa-solid fa-calendar-days"></i>Plánovač </a>
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




-->


<div class="page-main-header">
    <div class="main-header-right row m-0">
      <div class="main-header-left">
        <div class="logo-wrapper"><a href="/"><img class="img-fluid" src="/images/otazkovac/logo.png" alt=""></a></div>
        <div class="dark-logo-wrapper"><a href="/"><img class="img-fluid" src="/images/otazkovac/logo.png" alt=""></a></div>
        <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
      </div>

      <div class="nav-right col pull-right right-menu p-0">
        <ul class="nav-menus">
          <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize" class="fa-solid fa-expand"></i></a></li>
          <li class="onhover-dropdown p-0">
            <button class="btn btn-primary-light" type="button"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket"></i> Odhlásit se</a></button>
          @auth
            <a  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Odhlásit se
                </a>
                @endauth
          </li>
        </ul>
      </div>
      <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
  </div>


  <div class="page-body-wrapper sidebar-icon">
    <!-- Page Sidebar Start-->
    <header class="main-nav">
      <div class="sidebar-user text-center"><a class="setting-primary" href="/setting"><i class="fa-solid fa-gear"></i></a><img class="img-90 rounded-circle" src="/images/dashboard/1.png" alt="">
        <div class="badge-bottom"><span class="badge badge-primary">Student</span></div><a href="/profil">
          <h6 class="mt-3 f-14 f-w-600">
              @auth
              <?php echo auth()->user()->name ?>
              @endauth

              @guest
                  host
              @endguest
        </h6></a>
        <ul>
            <li><span><?php echo (count(auth()->user()->folder))?></span>
              <p>Složek</p>
            </li>
          <li><span><span class="counter"><?php echo (count(auth()->user()->package))?></span></span>
            <p>Balíčků</p>
          </li>
          <li><span><span class="counter"><?php echo (count(auth()->user()->question))?></span></span>
            <p>Otázek</p>
          </li>
        </ul>
      </div>
      <nav>
        <div class="main-navbar">
          <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
          <div id="mainnav">           
            <ul class="nav-menu custom-scrollbar">
              <li class="back-btn">
                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
              </li>
              <li class="dropdown"><a class="nav-link menu-title" href="/dashboard"><i class="fa-solid fa-chart-line"></i><span>Dashboard</span></a> </li>

              <li class="sidebar-main-title">
                <div>
                  <h6>Produktivita</h6>
                </div>
              </li>
              <li class="dropdown"><a class="nav-link menu-title" href="/checklist"><i class="fa-solid fa-clipboard-check"></i><span>Checklist</span></a> </li>
              <li class="dropdown"><a class="nav-link menu-title" href="/scheduled"><i class="fa-solid fa-calendar-days"></i><span>Návyky</span></a> </li>
              <li class="sidebar-main-title">
                <div>
                  <h6>Účení</h6>
                </div>
              </li>
              <li class="dropdown"><a class="nav-link menu-title" href="/folders"><span><i class="fa-solid fa-folder-open"></i>Učení</span></a> </li>
              <li class="dropdown"><a class="nav-link menu-title" href="/edit-folders"><span><i class="fa-solid fa-file-pen"></i>Správce balíčků</span></a> </li>
              <li class="dropdown"><a class="nav-link menu-title" href="/public-packages"><i class="fa-solid fa-box-open"></i><span>Veřejné balíčky</span></a> </li>
          
              <li class="sidebar-main-title">
                <div>
                  <h6>Ostatní</h6>
                </div>
              </li>
              </li>
              <li class="dropdown"><a class="nav-link menu-title" href="/navod"><i class="fa-solid fa-book"></i><span>Návod</span></a> </li>
              <li class="dropdown"><a class="nav-link menu-title" href="/profil"><i class="fa-solid fa-user"></i><span>Profil</span></a> </li>
              <li class="dropdown"><a class="nav-link menu-title" href="/setting"><i class="fa-solid fa-gear"></i><span>Nastavení</span></a> </li>
          
            </ul>
          </div>
          <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
      </nav>
    </header>


  </div>