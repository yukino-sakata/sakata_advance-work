<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/menu2.css')}}" />

</head>
<body>
    <header class="header">
        <div class="header__inner">
            <button type="button" onClick="history.back()" class="header__logo">×
            </button>
        </div>
    </header>

    <main>
        <div class="content">
            <ul class="link">
                <li class="link-item">
                    <a class="link__home" href="{{asset('shoplist')}}">Home</a>
                </li>
                <li class="link-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="link__logout">Logout</button>
                    </form>
                </li>
                <li class="link-item">
                    <a class="link__mypage" href="{{asset('mypage')}}">Mypage</a>
                </li>
        </div>
    </main>
</body>

</html>