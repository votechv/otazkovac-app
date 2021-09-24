@extends('layouts.body')

@section('title', 'veřejné balíčky')

@section('content')


    <div class="hp-main">
        <h2> Všechny veřejné otázky </h2>
    </div>



    <div class="indexpackage package-height">
        <div class="indexpackage__wrap"> 
                    
            @foreach ($packages as $package)
            @if ($package->user_id === 1)
            
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


@endsection
