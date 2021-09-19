@extends('layouts.body')

@section('content')

<div class="profile-main">
    <div class="profile-main__content"> 
        <p> Vaše jméno: <strong> {{auth()->user()->name}} </strong></p>
        <p> Váš email:<strong>  {{auth()->user()->email}} </strong></p>
        <p> Datum registrace:<strong> {{auth()->user()->created_at}} </strong></p>
        <p> Počet balíčků: <strong>{{auth()->user()->package->count()}} </strong></p>
        <p> Počet otázek: <strong>{{auth()->user()->question->count()}} </strong></p>
    </div>
</div>
@endsection