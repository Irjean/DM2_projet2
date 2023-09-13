<div class="nft-card">
    <img class="nft-img" src="{{asset($nft->image)}}" alt="Nft">
    <div class="nft-info">
        <h3>{{$nft->title}}</h3>
        <div class="nft-sub-info">
            <span>{{$nft->artist}}</span>
            <span>{{$nft->price}} ETH</span>
        </div>
        <div class="nft-sub-info">
            <a href="/nft/{{$nft->id}}"><button>Details</button></a>
            @isset($sell)
                <a href="/nft/{{$nft->id}}/sell"><button class="sell-btn">Sell</button></a>
            @endisset
        </div>
        
    </div>
</div>