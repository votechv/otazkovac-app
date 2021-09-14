@extends('layouts.body')

@section('content')



 


           
 <div class="wrap-content-index ">   
     <div class="wrap-content-index__content">     
<h2> Jazyky 🇬🇧</h2>
    <div class="indexpackage package-height">  
        <div class="indexpackage__wrap wrap-border"> 
                    
            @foreach ($packages as $package)
            @if ($package->user_id === 1 && $package->category == "jazyk")
            
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

    <h2> Zábava 🤪 </h2> 

<div class="indexpackage package-height">  
    <div class="indexpackage__wrap"> 
        @foreach ($packages as $package)
        @if ($package->user_id === 1 && $package->category == "zabava")

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


<h2> Český jazyk 📚</h2> 

<div class="indexpackage package-height">  
    <div class="indexpackage__wrap"> 
        @foreach ($packages as $package)
        @if ($package->user_id === 1 && $package->category == "cestina")

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
</div> 
</div>   


@endsection
