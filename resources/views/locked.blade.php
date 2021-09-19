@extends('layouts.body')

@section('content')



<div class="locked-package">
    <div class="locked-package__main">
        <div class="locke-package__main-content">
            @guest              
            <h2> <i class="fas fa-lock"></i> Nejste přihlášeni</h2>
            <a href="/register"><button class="register">Registrovat se</button></a>
            <a href="/login"><button class="login">Přihlásit se</button></a>
            @endguest

            @auth
            <h2> <i class="fas fa-unlock"></i>Jste úspěšně přihlášení</h2>
            @endauth
        </div>
    </div>

    <div class="locked-package__content">
        <div class="locked-package__content-wrap">
            <h2>Nechte se vyzkoušet pomocí našeho algoritmu!</h2>

            <div class="locked-package__content-image">
                <img src="http://cdn.vojtechvanek.com/otazkovac-spin-small.gif" alt="otazkovac">
            </div>
        </div>
        <div class="locked-package__content-wrap">
            <h2>Jak přidávat nové balíčky a otázky?</h2>

            <div class="locked-package__content-image">
                <img src="http://cdn.vojtechvanek.com/otazkovac-add-small.gif" alt="otazkovac">
            </div>
        </div>
        <div class="locked-package__content-wrap">
            <h2>Editaci balíčků zvládnete s prstem v nose!</h2>

            <div class="locked-package__content-image">
                <img src="http://cdn.vojtechvanek.com/otazkovac-edit-small.gif" alt="otazkovac">
            </div>
        </div>
    </div>
</div>


           


@endsection
