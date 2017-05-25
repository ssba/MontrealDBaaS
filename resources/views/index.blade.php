<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> {{ __('core.index_title') }} </title>

        <!-- Theme CSS -->
        <link href="../css/index.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <!-- Navigation -->
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        {{ __('core.menu') }} <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            @if (Auth::guest())
                                <a href="{{ url('/login') }}">{{ __('core.login') }}</a>
                            @else
                                <a href="{{ url('/user') }}">{{ __('core.dashboard') }}</a>
                            @endif

                        </li>
                        <li>
                            <a class="page-scroll" href="#about">{{ __('core.about') }}</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#download">{{ __('core.download') }}</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">{{ __('core.contact') }}</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Intro Header -->
        <header class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="brand-heading">{{ __('core.index_intro') }}</h1>
                            <p class="intro-text">{{ __('core.index_intro_text_1') }}
                                <br>{{ __('core.index_intro_text_2') }}</p>
                            <a href="#about" class="btn btn-circle page-scroll">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- About Section -->
        <section id="about" class="container content-section text-center">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>{{ __('core.index_about_section') }}</h2>
                    <p>{{ __('core.index_about_section_text_1') }}</p>
                    <p>{{ __('core.index_about_section_text_2') }}</p>
                    <p>{{ __('core.index_about_section_text_3') }}</p>
                </div>
            </div>
        </section>

        <!-- Download Section -->
        <section id="download" class="content-section text-center">
            <div class="download-section">
                <div class="container">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h2>{{ __('core.index_download_section') }}</h2>
                        <p>{{ __('core.index_download_section_text_1') }}</p>
                        <a href="http://startbootstrap.com/template-overviews/grayscale/" class="btn btn-default btn-lg">{{ __('core.index_download_section_button') }}</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="container content-section text-center">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>{{ __('core.index_contact_section') }}</h2>
                    <p>{{ __('core.index_contact_section_text_1') }}</p>
                    <p><a href="mailto:{{ __('core.index_contact_section_en_email') }}">{{ __('core.index_contact_section_en_email') }}</a>
                    </p>
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">{{ __('core.twitter') }}</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">{{ __('core.github') }}</span></a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">{{ __('core.google_plus') }}</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Map Section -->
        <div id="map"></div>

        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>{{ __('core.copyright') }} &copy; {{ __('core.site_name') }} {{ date('Y') }}</p>
            </div>
        </footer>



        <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0CpSyVky-fEtz85LuuvovGMHqKtn5nKE&sensor=false"></script>
        <script src="/js/index.js"></script>

    </body>
</html>