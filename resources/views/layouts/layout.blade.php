<html>
    <head>
        <link rel="stylesheet" href="/css/app.css"/>
     </head>
    <body>
        <div class="container">
            <div class="row">
            <h1>Laravel: Formulários e Validações</h1>
             @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{Session::get('message')}}
            </div>
             @endif
                @yield('content')
            </div>
        </div>
        <script type="text/javascript" src="/js/app.hs"></script>
    </body>
</html>