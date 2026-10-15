<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <h2> Sistem infromasi Surat</h2>
        <nav>
        <hr>
            <a href="{{ route('dashboard')}}">dashboar</a>|
            <a href="{{ route('surat-masuk.index')}}">surat masuk</a>|
            <a href="{{ route('surat-keluar.index')}}">surat keluar</a>
        <hr>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>System informasi Surat</p>
    </footer>
</body>
</html>