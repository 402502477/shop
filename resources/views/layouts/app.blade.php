<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>@yield('title')</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('assets/css/paper-dashboard.css') }}" rel="stylesheet"/>

    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet">

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/pages.css') }}">

    <script src="{{ asset('assets/js/laydate.js') }}"></script>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{ asset('assets/js/bootstrap-checkbox-radio.js') }}"></script>

    <!--  Charts Plugin -->
    <script src="{{ asset('assets/js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

    <!---<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>--->

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="{{ asset('assets/js/paper-dashboard.js') }}"></script>

    <script src="{{ asset('assets/js/pages.js') }}"></script>
    
</head>
<body>
<!-- Modal -->
<div class="modal fade in" id="showModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cancel" data-dismiss="modal">{{ __('content.cancel') }}</button>
                <button type="button" class="btn btn-success success" data-dismiss="modal">{{ __('content.ok') }}</button>
            </div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="/" class="simple-text">
                    <strong>Shop</strong> Admin
                </a>
            </div>

            <ul class="nav">
                <li class="{{ ($routeName ?? null) == 'index' ? 'active' : ''}}">
                    <a href="{{ url('/') }}">
                        <i class="ti-home"></i>
                        <p>{{ __('pages.index') }}</p>
                    </a>
                </li>
                <li class="{{ ($routeName ?? null) == 'order' ? 'active' : ''}}">
                    <a href="{{ url('/order') }}">
                        <i class="ti-pencil-alt"></i>
                        <p>{{ __('pages.order') }}</p>
                    </a>
                </li>
                <li class="{{ ($routeName ?? null) == 'product' ? 'active' : ''}}">
                    <a href="{{ url('/product') }}">
                        <i class="ti-dropbox"></i>
                        <p>{{ __('pages.product') }}</p>
                    </a>
                </li>
                <li class="{{ ($routeName ?? null) == 'stock' ? 'active' : ''}}">
                    <a href="{{ url('/stock') }}">
                        <i class="ti-bag"></i>
                        <p>{{ __('pages.stock') }}</p>
                    </a>
                </li>
                <li class="{{ ($routeName ?? null) == 'report' ? 'active' : ''}}">
                    <a href="{{ url('/report') }}">
                        <i class="ti-clipboard"></i>
                        <p>{{ __('pages.report') }}</p>
                    </a>
                </li>
                <li class="{{ ($routeName ?? null) == 'member' ? 'active' : ''}}">
                    <a href="{{ url('/member') }}">
                        <i class="ti-id-badge"></i>
                        <p>{{ __('pages.member') }}</p>
                    </a>
                </li>
                <li class="{{ ($routeName ?? null) == 'user' ? 'active' : ''}}">
                    <a href="{{ url('/user') }}">
                        <i class="ti-user"></i>
                        <p>{{ __('pages.user') }}</p>
                    </a>
                </li>
                <li class="{{ ($routeName ?? null) == 'set' ? 'active' : ''}}">
                    <a href="{{ url('/set') }}">
                        <i class="ti-settings"></i>
                        <p>{{ __('pages.set') }}</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="">
                        <i class="ti-export"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">{{ $title }}</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
                                <p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-user"></i>
                                <p>{{ Auth::user()->name }}</p>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/profile">{{ __('pages.profile') }}</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            @section('content')
            @show
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="#">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="#/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    Copyright &copy; 2017.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a>
                </div>
            </div>
        </footer>

    </div>
</div>
</body>

<script type="text/javascript">
    @if($notify = $notify['type'] ?? null)
    pages.showNotifies("{{ $notify['msg'] }}","{{ $notify['type'] }}",'bottom','right');
    @endif
    document.onreadystatechange = pages.onReadyStatsChange;
    pages.onErrorAvatar();
</script>

</html>
