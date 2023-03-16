<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penta Value Test ( Bishoy Sabry)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        a {color:white;text-decoration: none;}
        a:hover {color:white;text-decoration: underline;}
        .container,.hint {margin-top: 100px}
        .hint {font-size: 22px}
    </style>
</head>
<body>
    <div class="container text-center">
    <button class="btn btn-primary">
        <a  href="{{ url('phone-otp')}}">Phone OTP</a>
    </button>
    <button class="btn btn-primary">
        <a title="front end task" href="{{ url('images-upload')}}">Upload Images</a>
    </button>
    <button class="btn btn-primary">
        <a  href="{{ url('categories')}}">Hierarchical Task</a>
    </button>
    <button class="btn btn-primary">
        <a  href="{{ url('projects')}}">Queries Task</a>
    </button>
    <p class="hint">
    i apolgize for twitter task as i made twitter project but they didn't confirm yet.</br>
    any way i would use that</br>
    https://github.com/atymic/twitter</br>
    for the implemtation.</br>
    </p>
    </div>
</body>
</html>