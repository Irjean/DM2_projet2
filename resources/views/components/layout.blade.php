<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NFT Market</title>
        <link rel="icon" type="image/x-icon" href="{{asset("./images/nft-market-logo.png")}}">
        <link rel="stylesheet" href="{{asset("css/app.css")}}">
        @isset ($cssLink)
            <link rel="stylesheet" href="{{asset($cssLink)}}">
        @endisset
    </head>
    <body>
        @include("/components/header")
        <main>
            @yield('content')
        </main>
    </body>
</html>