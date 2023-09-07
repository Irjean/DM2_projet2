<?php
    $activeTag = "all";
?>

@extends('./components/layout')

@section('content')
    <section id="nft-list-section">
        <h2>Liste des NFT</h2>
        <ul class="tag-list">
            <li>All</li>
            <li>Collectible</li>
            <li>Metaverse</li>
            <li>Utility</li>
            <li>Online Video Game</li>
        </ul>
        <div class="nft-container">
            @foreach ($nfts as $nft)
                @include('./components/nftCard', ["nft" => $nft]);
            @endforeach
        </div>
    </section>
@endsection