@extends('admin.layout')

@section('body-class', 'hold-transition sidebar-mini '. \Auth::user()->settings->tpl_skin ?: "skin-blue")

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
                            <a href="#" data-toggle="control-sidebar" data-controlsidebar='control-sidebar-open'><i class="fa fa-gears"></i></a>
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
                    <form method="post" action="{{ route('Main:PostSettingsSaveingAction') }}">
                        <h4 class='control-sidebar-heading'>Skins</h4>
                        <ul class="list-unstyled clearfix">
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href='javascript:void(0);' data-skin='skin-blue' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 7px; background: #367fa9;'></span>
                                        <span class='bg-light-blue' style='display:block; width: 80%; float: left; height: 7px;'></span>
                                    </div>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span>
                                        <span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span>
                                    </div>
                                </a>
                                <p class='text-center no-margin'>Blue</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href='javascript:void(0);' data-skin='skin-black' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>
                                   <div style='box-shadow: 0 0 2px rgba(0,0,0,0.1)' class='clearfix'>
                                       <span style='display:block; width: 20%; float: left; height: 7px; background: #fefefe;'></span>
                                       <span style='display:block; width: 80%; float: left; height: 7px; background: #fefefe;'></span>
                                   </div>
                                   <div>
                                       <span style='display:block; width: 20%; float: left; height: 20px; background: #222;'></span>
                                       <span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span>
                                   </div>
                                </a>
                                <p class='text-center no-margin'>Black</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href='javascript:void(0);' data-skin='skin-purple' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 7px;' class='bg-purple-active'></span>
                                        <span class='bg-purple' style='display:block; width: 80%; float: left; height: 7px;'></span>
                                    </div>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span>
                                        <span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span>
                                    </div>
                                </a>
                                <p class='text-center no-margin'>Purple</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href='javascript:void(0);' data-skin='skin-green' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 7px;' class='bg-green-active'></span>
                                        <span class='bg-green' style='display:block; width: 80%; float: left; height: 7px;'></span>
                                    </div>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span>
                                        <span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span>
                                    </div>
                                </a>
                                <p class='text-center no-margin'>Green</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href='javascript:void(0);' data-skin='skin-red' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 7px;' class='bg-red-active'></span>
                                        <span class='bg-red' style='display:block; width: 80%; float: left; height: 7px;'></span>
                                    </div>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span>
                                        <span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span>
                                    </div>
                                </a>
                                <p class='text-center no-margin'>Red</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href='javascript:void(0);' data-skin='skin-yellow' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 7px;' class='bg-yellow-active'></span>
                                        <span class='bg-yellow' style='display:block; width: 80%; float: left; height: 7px;'></span>
                                    </div>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span>
                                        <span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span>
                                    </div>
                                </a>
                                <p class='text-center no-margin'>Yellow</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href='javascript:void(0);' data-skin='skin-blue-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 7px; background: #367fa9;'></span>
                                        <span class='bg-light-blue' style='display:block; width: 80%; float: left; height: 7px;'></span>
                                    </div>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span>
                                        <span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span>
                                    </div>
                                </a>
                                <p class='text-center no-margin' style='font-size: 12px'>Blue Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href='javascript:void(0);' data-skin='skin-black-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>
                                    <div style='box-shadow: 0 0 2px rgba(0,0,0,0.1)' class='clearfix'>
                                        <span style='display:block; width: 20%; float: left; height: 7px; background: #fefefe;'></span>
                                        <span style='display:block; width: 80%; float: left; height: 7px; background: #fefefe;'></span>
                                    </div>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span>
                                        <span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span>
                                    </div>
                                </a>
                                <p class='text-center no-margin' style='font-size: 12px'>Black Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href='javascript:void(0);' data-skin='skin-purple-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 7px;' class='bg-purple-active'></span>
                                        <span class='bg-purple' style='display:block; width: 80%; float: left; height: 7px;'></span>
                                    </div>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span>
                                        <span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span>
                                    </div>
                                </a>
                                <p class='text-center no-margin' style='font-size: 12px'>Purple Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href='javascript:void(0);' data-skin='skin-green-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 7px;' class='bg-green-active'></span>
                                        <span class='bg-green' style='display:block; width: 80%; float: left; height: 7px;'></span>
                                    </div>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span>
                                        <span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span>
                                    </div>
                                </a>
                                <p class='text-center no-margin' style='font-size: 12px'>Green Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href='javascript:void(0);' data-skin='skin-red-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 7px;' class='bg-red-active'></span>
                                        <span class='bg-red' style='display:block; width: 80%; float: left; height: 7px;'></span>
                                    </div>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span>
                                        <span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span>
                                    </div>
                                </a>
                                <p class='text-center no-margin' style='font-size: 12px'>Red Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href='javascript:void(0);' data-skin='skin-yellow-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 7px;' class='bg-yellow-active'></span>
                                        <span class='bg-yellow' style='display:block; width: 80%; float: left; height: 7px;'></span>
                                    </div>
                                    <div>
                                        <span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span>
                                        <span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span>
                                    </div>
                                </a>
                                <p class='text-center no-margin' style='font-size: 12px;'>Yellow Light</p>
                            </li>
                        </ul>

                    </form>
                </div>
            </div>
        </aside>
        <div class="control-sidebar-bg"></div>
    </div>
@endsection




