<?php
    $user = Auth::user();
    if($user == null){
        $wallet = 0;
    } else {
        $wallet = Auth::user()->wallet;
    }
?>

@extends('./components/layout')

@section('content')
<section id="nft-detail">
    <h2>{{$nft->title}}</h2>
    <img src="{{asset($nft->image)}}" alt="nft">
    <p>Description : {{$nft->description}}</p>
    <span>made by : {{$nft->artist}}</span>
    <span>Strandard : {{$nft->standard_token}}</span>
    <span><a href="{{$nft->adress}}" target="_blank">Link to the contract</a></span>
    <span>Owned by : {{$owner->name}}</span>
    <span>Price : {{$nft->price}} ETH</span>
    @if ($wallet > $nft->price && $owner->name == "nobody")
    <a href="./{{$nft->id}}/buy"><button class="buy-btn">Buy</button></a>
    @else
    <button class="buy-btn disabled" disabled>Buy</button>
    @endif
    @if(Session::get("success"))
        <span>{{Session::get("success")}}</span>
    @endif
    @error("error")
        <span>{{$message}}</span>
    @enderror
</section>
@endsection