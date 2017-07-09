<!DOCTYPE html>
<html lang="en" @yield('html_tag_attributes')>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', '😎') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="{{ asset('css/multi-level-navbar-menu.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/styles/shCore.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/styles/shThemeRDark.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">

    <link rel="shortcut icon" href="{{{ asset('images/favicon.ico') }}}">

    @stack('css')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @include('_navbar.basic')
                    @include('_navbar.event')
                    @include('_navbar.control')
                    @include('_navbar.style')
                    @include('_navbar.drawing')
                    @include('_navbar.layer')
                    @include('_navbar.maptype')
                    @include('_navbar.service')
                    @include('_navbar.library')
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Playground</li>
                                <li>
                                    <a href="{{ url('test/proximity-search') }}">
                                        Proximity Search
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Deprecated</li>
                                @include('_navbar.signedin')
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Modal dialog  -->
    <div class="modal animated" id="source_code"
            data-animate-css-show="rollIn" data-animate-css-hide="rollOut">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <h4 class="modal-title">Source Code</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#javascript" data-toggle="tab">Javascript</a></li>
                            <li><a href="#css" data-toggle="tab">CSS</a></li>
                            <li><a href="#html" data-toggle="tab">HTML</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="javascript">
                                <pre class="brush: js;">
                                    @yield('source-code-javascript')
                                </pre>
                            </div>
                            <div class="tab-pane" id="css">
                                <pre class="brush: css;">
                                    @yield('source-code-css')
                                </pre>
                            </div>
                            <div class="tab-pane" id="html">
                                <pre class="brush: xml;">
                                    @yield('source-code-html')
                                </pre>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="{{ asset('js/bootstrap-modal-animate-css.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/scripts/shCore.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SyntaxHighlighter/3.0.83/scripts/shBrushJScript.min.js"></script>
    <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushCss.js"></script>
    <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shBrushXml.js"></script>
    <script src="http://alexgorbatchev.com/pub/sh/current/scripts/shAutoloader.js"></script>

    <script>
        $('.navbar .dropdown').hover(function() {
                $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
            },
            function() {
                $(this).find('.dropdown-menu').first().stop(true, true).slideUp(105)
            }
        );

        SyntaxHighlighter.all()
    </script>

    @stack('js')
</body>
</html>
