<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="/css/app.css" />
    </head>
    <body>
        <div id="app">
            <div class="container">
                @include('layouts._header')
                <br />
                    <div class="content">
                        @include('layouts._errors')
                        @yield('content')
                    </div>
                <br />
                @include('layouts._footer')
            </div>
        </div>
            <script src="/js/app.js"></script>
    </body>
</html>
