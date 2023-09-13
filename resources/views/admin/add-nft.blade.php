@extends('./components/layout')

@section("content")
<section id="add-nft-section">
    <h2>Add new NFT</h2>
    <div>
        <a href="../">Nft list</a>
        <a href="/admin">User list</a>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Title</label>
        <input id="title" name="title" type="text" maxlength="45" required>
        <label for="artist">Artist</label>
        <input id="artist" name="artist" type="text" maxlength="45" required>
        <label for="adress">Contract adress</label>
        <input id="adress" name="adress" maxlength="255" type="text" required>
        <label for="standard_token">Standard token</label>
        <select id="standard_token" name="standard_token">
            <option value="ERC-721">ERC-721</option>
            <option value="ERC-1155">ERC-1155</option>
            <option value="ERC-998">ERC-998</option>
        </select>
        <label for="price">Price (ETC)</label>
        <input id="price" name="price" type="number" step=".01" required>
        <label for="image">Image</label>
        <input id="image" name="image" type="file" accept="image/*" required>
        <label for="category">Category</label>
        <select id="category" name="category">
            <option value="collectible">Collectible</option>
            <option value="metaverse">Metaverse</option>
            <option value="utility">Utility</option>
            <option value="online-video-game">Online Video Game</option>
        </select>
        <label for="description">Description</label>
        <textarea id="description" name="description" required></textarea>
        @error('name')
            <span class="error-message">{{$message}}</span>
        @enderror
        <button type="submit">Add new NFT</button>
    </form>
</section>
@endsection