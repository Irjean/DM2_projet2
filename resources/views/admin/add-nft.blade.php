@extends('./components/layout')

@section("content")
<section id="add-nft-section">
    <h2>Login</h2>
    <form action="" method="POST">
        @csrf
        <label for="name">Title</label>
        <input id="name" name="name" type="text">
        <label for="password">Artist</label>
        <input id="password" name="password" type="password">
        <label for="adress">Contract adress</label>
        <input id="adress" name="adress" type="password">
        <label for="standard-token">Standard token</label>
        <select id="standard-token" name="standard-token">
            <option value="ERC-721">ERC-721</option>
            <option value="ERC-1155">ERC-1155</option>
            <option value="ERC-998">ERC-998</option>
        </select>
        <label for="price">Price (ETC)</label>
        <input id="price" name="price" type="password">
        <label for="image-link">Image link</label>
        <input id="image-link" name="image-link" type="password">
        <label for="category">Category</label>
        <select id="category" name="category">
            <option value="collectible">Collectible</option>
            <option value="metaverse">Metaverse</option>
            <option value="utility">Utility</option>
            <option value="online-video-game">Online Video Game</option>
        </select>
        <label for="desription">Description</label>
        <textarea id="desription" name="desription"></textarea>
        @error('name')
            <span class="error-message">{{$message}}</span>
        @enderror
        <button type="submit">Add new NFT</button>
    </form>
</section>
@endsection