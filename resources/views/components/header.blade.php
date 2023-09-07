<header>
    <a href="./" class="home-img-link">
        <img src="{{asset("./images/nft-market-logo.png")}}" alt="logo">
    </a>
    <nav>
        <ul>
            @auth
                <li>
                    <a href="/collection">
                        <img src="{{asset("/images/collection-icon2.png")}}" alt="collection">
                    </a>
                </li>
                <li>
                    <a href="/logout">
                        <img src="{{asset("/images/logout-icon.png")}}" alt="collection">
                    </a>
                </li>
            @endauth
            @guest    
                <li>
                    <a href="/login">
                        <img src="{{asset("/images/login-icon.png")}}" alt="login">
                    </a>
                </li>
            @endguest
        </ul>
    </nav>
</header>