<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My SPA</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app" x-data="{ page: 'login' }">
        <button @click="page = 'login'">Login</button>
        <button @click="page = 'index'">Index</button>

        <div x-show="page === 'login'">
            @livewire('login')
        </div>

        <div x-show="page === 'index'">
            @livewire('index')
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
