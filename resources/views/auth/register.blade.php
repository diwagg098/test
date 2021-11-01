<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css')}}">
        <title>Register</title>
    </head>
    
    <body>
        <div class="login-page">
        <div class="form">
        <form class="login-form" action="{{ url('register')}}" method="POST">
            @csrf
            <input type="text" placeholder="name" name="name" value="{{ old('name')}}">
            @error('name')
            <small class="text-danger">{{ $message}}</small>
            @enderror
            <input type="text" placeholder="email" name="email" value="{{ old('email')}}">
            @error('email')
            <small class="text-danger">{{ $message}}</small>
            @enderror
            <input type="text" placeholder="username" name="username" value="{{ old('username')}}">
            @error('username')
            <small class="text-danger">{{ $message}}</small>
            @enderror
            <input type="password" placeholder="password" name="password">
            @error('password')
            <small class="text-danger">{{ $message}}</small>
            @enderror
            <input type="password" placeholder="Confirm Password" name="confirm_password">
            @error('confirm_password')
            <small class="text-danger">{{ $message}}</small>
            @enderror
            <button type="submit">Register</button>
        </form>
        </div>
        </div>
    </body>
</html>