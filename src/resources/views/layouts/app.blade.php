<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/common.css')}}" />
    @yield('css')

</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="left-item">
                <div class="icon">
                    <div class="icon__inner"></div>
                </div>
                <a class="header__logo" href="/">
                Rese
                </a>
            <div>
            @yield('search')
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>