<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css')}}">
        <title>Login</title>
    </head>
    
    <body>
        <div class="login-page">
        <div class="form">
            @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
        <form class="login-form" action="{{ url('login')}}" method="POST">
            @csrf
            <input type="text" placeholder="username" name="username" value="{{ old('username')}}">
            <input type="password" placeholder="password" name="password">
            <button type="submit">Login</button>
            <p class="message">Not registered? <a href="{{ url('register')}}">Create an account</a></p>
        </form>
        </div>
        </div>
        @include('sweetalert::alert');
    </body>
</html>