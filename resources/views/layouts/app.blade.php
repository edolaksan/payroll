<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll System</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Gaya dasar untuk seluruh halaman */
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f0f2f5;
            color: #4a4a4a;
            margin: 0;
            padding: 0;
        }

        /* Gaya untuk navigasi */
        nav {
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 600;
            padding: 8px 15px;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 25px;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        /* Gaya untuk kontainer */
        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        /* Gaya untuk tombol */
        button,
        .btn {
            background-color: #2575fc;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-block;
            text-align: center;
        }

        button:hover,
        .btn:hover {
            background-color: #6a11cb;
        }

        /* Gaya untuk judul */
        h1,
        h2 {
            color: #2575fc;
        }

        /* Gaya untuk link */
        a {
            color: #2575fc;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #6a11cb;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{ route('pegawai.index') }}">Pegawai</a></li>
            <li><a href="{{ route('gaji.index') }}">Gaji</a></li>
            <li><a href="{{ route('hari_kerja.index') }}">Hari Kerja</a></li>
            <li><a href="{{ route('absensi.index') }}">Absensi</a></li>
            <li><a href="{{ route('laporan.gaji') }}">Laporan Gaji</a></li>
            @auth
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <li><a href="{{ route('auth.login') }}">Login</a></li>
                <li><a href="{{ route('auth.register') }}">Register</a></li>
            @endauth
        </ul>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
