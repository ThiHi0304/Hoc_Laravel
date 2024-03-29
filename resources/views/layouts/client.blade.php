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
   @include('clients.blocks.header')
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    @yield('sidebar')
                    <aside>
                        @section('sidebar')
                            @include('clients.blocks.sidebar')
                        @endsection
                    </aside>
                </div>
                <div class="col-9">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('clients.blocks.footer')
    <script>{{asset('assets/clients/js/boostrap.min.css')}}</script>
    <script>{{asset('assets/clients/js/custom.css')}}</script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @yield('js')    
    @stack('scripts')
</body>
</html>