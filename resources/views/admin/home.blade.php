@extends('./components/layout')

@section('content')
    <section id="home-admin">
        <h2>Admin page</h2>
        <a href="/admin/nfts">List des NFT</a>
        <table>
            <thead>
                <th>Email</th>
                <th>Wallet</th>
                <th>Nft Owned</th>
            </thead>
            <tbody>
                <tr>
                    <td class="table-mail">partick@mail.fr</td>
                    <td class="table-wallet">500 ETH</td>
                    <td class="table-nft">3</td>
                </tr>
                @foreach($users as $user)
                @php
                        $nftCount = 0;
                        foreach ($nfts as $nft) {
                            if ($nft->user_id == $user->id) {
                                $nftCount++;
                            }
                        }
                @endphp
                <tr>
                    <td class="table-mail">{{$user->email}}</td>
                    <td class="table-wallet">{{$user->wallet}} ETH</td>
                    <td class="table-nft">{{$nftCount}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection