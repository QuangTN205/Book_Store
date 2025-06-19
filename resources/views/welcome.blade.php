<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào mừng đến với Tiệm Sách</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #8EC5FC, #E0C3FC);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: #1a1a1a;
            text-align: center;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        .buttons {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            justify-content: center;
        }
        a.button {
            background-color: #3490dc;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        a.button:hover {
            background-color: #2779bd;
        }
        a.register {
            background-color: #38c172;
        }
        a.register:hover {
            background-color: #2f9e63;
        }
    </style>
</head>
<body>
    <h1>📚 Tiệm Sách Trực Tuyến</h1>
    <p>Chào mừng bạn đến với cửa hàng sách của chúng tôi!</p>

    @auth
        <a href="{{ url('/dashboard') }}" class="button">Vào trang quản lý</a>
    @else
        <div class="buttons">
            <a href="{{ route('login') }}" class="button">Đăng nhập</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="button register">Đăng ký</a>
            @endif
        </div>
    @endauth
</body>
</html>
