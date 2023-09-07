<a class="nft-card" href="/nft/{{$nft->id}}">
    <img class="nft-img" src="{{asset($nft->image)}}" alt="Nft">
    <div class="nft-info">
        <h3>{{$nft->title}}</h3>
        <div class="nft-sub-info">
            <span>{{$nft->artist}}</span>
            <span>{{$nft->price}} ETH</span>
        </div>
    </div>
</a>