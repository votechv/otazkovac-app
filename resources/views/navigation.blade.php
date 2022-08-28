
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@auth
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
          </li>
        </ul>
      </div>
      <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
  </div>
@endauth