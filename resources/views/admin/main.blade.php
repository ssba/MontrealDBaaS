@extends('admin.layout')

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

@section('body-class', 'hold-transition skin-blue sidebar-mini')

@section('body-content')

    <div class="wrapper">

        <header class="main-header">
            <a href="{{  route('Main:GetUserPage', ['userGUID' => Auth::user()->id])  }}" class="logo">
                <span class="logo-mini">{!! __('core.panel.tpl.main.site_name_short_html') !!}</span>
                <span class="logo-lg">{!! __('core.panel.tpl.main.site_name_html') !!}</span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">{{  __('core.panel.tpl.main.toggle_navigation') }}</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/images/admin/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="/images/admin/user2-160x160.jpg" class="img-circle" alt="User Image">
                                    <p>
                                        {{ Auth::user()->fname }} {{ Auth::user()->lname }}
                                        <small>{{  __('core.panel.tpl.main.member_since') }} {{ date("F Y", Auth::user()->created_at->timestamp) }}</small>
                                    </p>
                                </li>
                                <li class="user-body">
                                    <div class="row">
                                    </div>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="{{ route("Auth:Logout") }}" class="btn btn-default btn-flat">{{  __('core.sign_out') }}</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/images/admin/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->fname }} {{ Auth::user()->lname }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="{{ __('core.search') }}">
                        <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                </form>
                {{ __('core.menu') }}
                <ul class="sidebar-menu">
                    <li class="header">{{ __('core.menu') }}</li>
                    <li class=" @yield('admin.user.home.menu_activation_state') ">
                        <a href="{{  route('Main:GetUserPage', ['userGUID' => Auth::user()->id])  }}">
                            <i class="fa fa-home"></i>
                            <span>{{ __('core.panel.tpl.home.title') }}</span>
                        </a>
                    </li>
                    <li class=" @yield('admin.user.settings.menu_activation_state') ">
                        <a href="{{  route('Main:GetUserSettings', ['userGUID' => Auth::user()->id])  }}">
                            <i class="fa fa-cog"></i>
                            <span>{{ __('core.panel.tpl.settings.title') }}</span>
                        </a>
                    </li>
                    <li class=" @yield('admin.user.databases.menu_activation_state') ">
                        <a href="{{  route('DataBase:GetAll', ['userGUID' => Auth::user()->id])  }}">
                            <i class="fa fa-pie-chart"></i>
                            <span>{{ __('core.panel.tpl.databases.title') }}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li class=" @yield('admin.user.databases.menu_activation_state') ">
                                <a href="{{  route('DataBase:GetAll', ['userGUID' => Auth::user()->id])  }}">
                                    <i class="fa fa-database"></i> <span>{{ __('core.panel.tpl.databases.list_title') }}</span>
                                </a>
                            </li>


                            <li>
                                <a href="{{  route('DataBase:GetAll', ['userGUID' => Auth::user()->id])  }}#create.database">
                                    <i class="fa fa-plus-circle"></i> <span>{{ __('core.panel.tpl.databases.create_title') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </section>

        </aside>

        <div class="content-wrapper" id="app">

            @yield('content-header')

            @yield('content')

        </div>

        @include ('admin.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li class="active"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">{{ __('core.panel.tpl.tpl_settings') }}</h3>
                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                            <p>Some information about this general settings option</p>
                        </div>
                    </form>
                </div>
            </div>
        </aside>
        <div class="control-sidebar-bg"></div>
    </div>
@endsection




