@extends('layouts.body')

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
                    <a href="/package/{{$package->id}} "> <i class="fas fa-play"></i> </a>
                </div>
            </div>
        </div>
    @endif
    @endforeach
   


</div>
</div>


@endsection
