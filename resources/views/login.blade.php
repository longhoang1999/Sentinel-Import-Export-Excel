<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(session('message'))
        <h1>{{ session('message') }}</h1>
    @endif


    <h1>Đăng nhập</h1>
    <form action="{{ route('postLogin') }}" method="post">
        @csrf
       <div>
            Email:
            <input type="email" name="email">
       </div>
       <div>
            Password:
            <input type="password" name="password">
       </div>
       <button>Đăng nhập</button>
    </form>



   <h1> Đăng ký</h1>
    <form action="{{ route('postRegister') }}" method="post">
        @csrf
       <div>
            Email:
            <input type="email" name="email">
       </div>
       <div>
            Password:
            <input type="password" name="password">
       </div>
       <button>Đăng ký</button>
    </form>
</body>
</html>
