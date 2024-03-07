<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')- Unicode</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
    @yield('css')
</head>
<body>
    <main class="py-5">
        <div class="container">
            <div class="row bg-light">
                <p>Task list</p>
            </div>
            <form action="" class="bg-light">
                <p>New task</p>
            </form>
        </div>

    </main>
   
    <script>{{asset('assets/clients/js/boostrap.min.css')}}</script>
    <script>{{asset('assets/clients/js/custom.css')}}</script>
    @yield('js')    
    @stack('scripts')
</body>
</html>