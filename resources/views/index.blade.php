@extends('layouts.offline')

@section('title', 'hlavní stránka')

@section('content')


    
<div class="homepage" id="offline">
    
    <div class="homepage__main">  
        <video autoplay muted id="mainvideo">
         <source src="../videos/black.mp4" type="video/mp4">
         Váš prohlížeč nepodporuje HTML5 :( 
       </video>

       <div class="homepage__main--bg"></div>

       <div class="homepage__main-title">
           <div class="homepage__main-title--bg"></div>
           <h1> Knowli </h1>
        </div>

       <div class="homepage__main-subtitle">
           <div class="homepage__main-subtitle--bg"></div>
               <h2> Váš průvodce učením </h2>
       </div>

       <i class="fa-solid fa-angles-down homepage-arrow"></i>
    </div>



      <div class="homepage__citation" id="homepage-citation-1">
          <div class="homepage__citation-content">
              <div class="homepage__citation--question"><i class="fa-solid fa-question"></i></div>
              <cite> „Věděli jste, že nejefektivnější metodou učení je <strong class="homepage__citate-strong">  aktivní učení? </strong> Např. testování sama sebe místo čtení textu pořád dokola“ </cite>
          </div>
      </div>


      <div class="homepage__left-content" id="homepage-content-1">
          <div class="homepage__left-content-wrap">
          <div class="homepage__left-text">
                <h2> Otázkovač </h2>
                <p>Při učení píšete otázky které vás napadnou a náš algoritmus vás následně vyzkouší.</p>
          </div>

          <div class="homepage__left-image">
            <video autoplay muted loop  id="">
                <source src="../videos/otazkovac02.mp4" type="video/mp4">
                Váš prohlížeč nepodporuje HTML5 :( 
              </video>
          </div>
        </div>
      </div>

      <div class="homepage__left-content" id="homepage-content-2">
          <div class="homepage__left-content-wrap">
              <div class="homepage__left-image">
                <video autoplay muted loop  class="homepage__left-image--skew2">
                    <source src="../videos/mainApp.mp4" type="video/mp4">
                    Váš prohlížeč nepodporuje HTML5 :( 
                  </video>
              </div>
          <div class="homepage__left-text">
                <p><strong>  „Mluvit anglicky se naučíš jen když budeš mluvit!“ </strong>Ale co když nemám s kým?  Otázkovač má pro vás veřejných tisíce otázek ve 4 jazycích!  🇬🇧 🇩🇪 🇪🇸 🇫🇷</p>
          </div>

        </div>
      </div>

      <div class="homepage__banner">
        <div class="homepage__banner-content">
            <h2 class="homepage__banner--title"> <a href="/register">Pojďte do toho!</a>  100% Zdarma! </h2>
        </div>
    </div>

    
      <div class="homepage__citation"  id="homepage-citation-2">
        <div class="homepage__citation-content">
            <div class="homepage__citation--question"><i class="fa-solid fa-question"></i></div>
            <cite> „Věděli jste, že většina lidí, kteří dělají rychle změny ve svém životě dříve nebo později selžou? <strong>Důležité je postupné budování malých návyků </strong>“</cite>
        </div>
    </div>


    <div class="homepage__left-content" id="homepage-content-3">
        <div class="homepage__left-content-wrap">
        <div class="homepage__left-text">
              <h2> Budování návyků </h2>
              <p>Budujte s Knowli svoje návyky. Zadejte svůj návyk a každý den  jej po splnění odškrtněte! Časem se z něj stane samozřejmost. </p>
        </div>

        <div class="homepage__left-image">
          <video autoplay muted loop  id="">
              <source src="../videos/otazkovac02.mp4" type="video/mp4">
              Váš prohlížeč nepodporuje HTML5 :( 
            </video>
        </div>
      </div>
    </div>


    <div class="homepage__citation" id="homepage-citation-3">
        <div class="homepage__citation-content">
            <div class="homepage__citation--question"><i class="fa-solid fa-question"></i></div>
            <cite> „Věděli jste, že pokud lidé drží své povinnosti v hlavě <strong> pociťují častěji úzkosti?  </strong> Nosit všechny úkoly v hlavě je obrovská zátěž, napište si je!“</cite>
        </div>
    </div>


    <div class="homepage__left-content" id="homepage-content-4">
        <div class="homepage__left-content-wrap">
            <div class="homepage__left-image">
              <video autoplay muted loop  class="homepage__left-image--skew2">
                  <source src="../videos/mainApp.mp4" type="video/mp4">
                  Váš prohlížeč nepodporuje HTML5 :( 
                </video>
            </div>
        <div class="homepage__left-text">
              <p><strong>  „Mluvit anglicky se naučíš jen když budeš mluvit!“ </strong>Ale co když nemám s kým?  Otázkovač má pro vás veřejných tisíce otázek ve 4 jazycích!  🇬🇧 🇩🇪 🇪🇸 🇫🇷</p>
        </div>

      </div>
    </div>




    




    


</div>

@endsection
