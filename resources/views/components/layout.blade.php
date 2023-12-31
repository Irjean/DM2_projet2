<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NFT Market</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
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