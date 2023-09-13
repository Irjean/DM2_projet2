@extends('./components/layout')

@section('content')
    <section id="nft-collection">
        <h2>Your NFTs</h2>
        
        <div class="nft-container">
            @foreach ($nfts as $nft)
                @include('./components/nftCard', ["nft" => $nft, "sell" => true])
            @endforeach
        </div>
    </section>
@endsection