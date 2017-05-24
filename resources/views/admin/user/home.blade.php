@extends('admin.main')

@section('title', $title )
@section('admin.user.home.menu_activation_state', 'active' )

@section('content-header')
    <content-header :breadcrumbs="false">

        Dashboard
        <small>Version 0.1.1</small>

    </content-header>
@endsection

@section('css')
@endsection

@section('js')
    <script src="/js/home.js"></script>
@endsection

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-cog"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">CPU Traffic</span>
                        <span class="info-box-number">{{ $data['cpu'] }}<small>%</small></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-cubes"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">RAM In use</span>
                        <span class="info-box-number">{{ $data['ram'] }}<small>%</small></span>
                    </div>
                </div>
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-database"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Databases</span>
                        <span class="info-box-number">{{ $data['db'] }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-globe"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Queries</span>
                        <span class="info-box-number">{{ number_format($data['requests']) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Monthly Recap Report</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center">
                                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                </p>

                                <div class="chart">
                                    <canvas id="salesChart" style="height: 280px;"></canvas>
                                </div>

                            </div>


                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Visitors Report</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="pad">
                                    <div id="world-map-markers" style="height: 400px;width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Recently Added Products</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <li class="item">
                                <div class="product-img">
                                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Samsung TV
                                        <span class="label label-warning pull-right">$1800</span></a>
                                    <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                                </div>
                            </li>
                            <!-- /.item -->
                            <li class="item">
                                <div class="product-img">
                                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Bicycle
                                        <span class="label label-info pull-right">$700</span></a>
                                    <span class="product-description">
                          26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                        </span>
                                </div>
                            </li>
                            <!-- /.item -->
                            <li class="item">
                                <div class="product-img">
                                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Xbox One <span class="label label-danger pull-right">$350</span></a>
                                    <span class="product-description">
                          Xbox One Console Bundle with Halo Master Chief Collection.
                        </span>
                                </div>
                            </li>
                            <!-- /.item -->
                            <li class="item">
                                <div class="product-img">
                                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">PlayStation 4
                                        <span class="label label-success pull-right">$399</span></a>
                                    <span class="product-description">
                          PlayStation 4 500GB Console (PS4)
                        </span>
                                </div>
                            </li>
                            <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>

            <div class="col-md-4">
                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">GET</span>
                        <span class="info-box-number">{{ number_format( array_get($data, 'methods_sats.get.count', 0) ) }} request/s</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: {{ array_get($data, 'methods_sats.get.persentage', 0) }}%"></div>
                        </div>
                        <span class="progress-description"></span>
                    </div>
                </div>

                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">POST</span>
                        <span class="info-box-number">{{ number_format( array_get($data, 'methods_sats.post.count', 0) ) }} request/s</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: {{ array_get($data, 'methods_sats.post.persentage', 0) }}%"></div>
                        </div>
                        <span class="progress-description"></span>
                    </div>
                </div>

                <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">PUT</span>
                        <span class="info-box-number">{{ number_format( array_get($data, 'methods_sats.put.count', 0) ) }} request/s</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: {{ array_get($data, 'methods_sats.put.persentage', 0) }}%"></div>
                        </div>
                        <span class="progress-description"></span>
                    </div>
                </div>

                <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">DELETE</span>
                        <span class="info-box-number">{{ number_format( array_get($data, 'methods_sats.delete.count', 0) ) }} request/s</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: {{ array_get($data, 'methods_sats.delete.persentage', 0) }}%"></div>
                        </div>
                        <span class="progress-description"></span>
                    </div>
                </div>

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Browser Usage</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="chart-responsive">
                                    <canvas id="DeviceChart" height="200"></canvas>
                                </div>
                                <!-- ./chart-responsive -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            @foreach (array_get($data, 'browsers', []) as $key => $browser)
                                <li><a href="#">{{ $key }} <span class="pull-right text-green"> {{ $browser['percentage'] }}%</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.footer -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection