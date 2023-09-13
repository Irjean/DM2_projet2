@extends('./components/layout')

@section('content')
    <section id="nft-list-section">
        <h2>Liste des NFT</h2>
        <ul class="tag-list">
            <a href="/"><li>All</li></a>
            <a href="/tag/collectible"><li>Collectible</li></a>
            <a href="/tag/metaverse"><li>Metaverse</li></a>
            <a href="/tag/utility"><li>Utility</li></a>
            <a href="/tag/online video game"><li>Online Video Game</li></a>
        </ul>
        <div class="nft-container">
            @foreach ($nfts as $nft)
                @include('./components/nftCard', ["nft" => $nft])
            @endforeach
        </div>
    </section>
@endsection