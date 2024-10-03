<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List App</title>
    @yield('styles')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div>
    <h1>@yield('title')</h1>
    <div>
        @if(session()->has('success'))
            <div>{{session('success')}}</div>
        @endif
        @yield('content')
    </div>
    </div>
    
</body>
</html>