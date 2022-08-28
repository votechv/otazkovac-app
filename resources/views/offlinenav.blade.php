<header class="offline-nav" id="offline-nav">
    <div class="offline-nav__content">
        <ul class="offline-nav__content-ul">
            <li>
                <a class= "{{ (request()-> is('/')) ? 'active-of' : '' }}" href="/">Hlavní stránka</a>
            </li>
            <li>
                <a class= "{{ (request()-> is('public')) ? 'active-of' : '' }}" href="/public">Veřejné otázky</a>
            </li>
            @guest        
            <li>
                <a class= "{{ (request()-> is('login')) ? 'active-of' : '' }}" href="/login">Přihlásit se </a>
            </li>
            <li>
                <a class= "{{ (request()-> is('register')) ? 'active-of' : '' }}" href="/register">Registrovat se</a>
            </li>
            @endguest

            @auth
            <li>
                <a href="/dashboard"> Do aplikace </a>
            </li>
            <li>
            <a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            Odhlásit se</a>
         
       
            </li>
            @endauth
        </ul>
        <i class="fa-solid fa-bars offline-ham"></i>
    </div>


    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</header>