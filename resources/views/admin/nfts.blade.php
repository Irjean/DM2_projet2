@extends('./components/layout')

@section('content')
    <section id="admin-nft-list">
        <h2>Admin page - Nft List</h2>
        <div>
            <a href="/admin/add-nft">Add a new NFT</a>
            <a href="/admin">User List</a>
        </div>
        <table>
            <thead>
                <th>Title</th>
                <th>Artist</th>
                <th>Owner</th>
                <th>Price</th>
                <th>Tag</th>
                <th>Delete ?</th>
            </thead>
            <tbody>

                @foreach($nfts as $nft)
                @php
                $owner = "nobody";
                $hasOwner = false;
                    foreach ($users as $user) {
                        if($user->id == $nft->user_id){
                            $owner = $user->name;
                            $hasOwner = true;
                        }
                    }
                @endphp
                    <tr>
                        <td>{{$nft->title}}</td>
                        <td>{{$nft->artist}}</td>
                        <td>{{$owner}}</td>
                        <td>{{$nft->price}}</td>
                        <td>{{$nft->category}}</td>
                        <td class="delete-column"><a href="./nfts/delete/{{$nft->id}}"><button @class(["delete-btn", "disabled" => ! $hasOwner])>Delete</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection