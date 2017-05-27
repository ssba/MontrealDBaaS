
@extends('admin.main')


@section('content-header')
    <content-header :breadcrumbs="false" >

        {{ __('core.panel.tpl.500.title') }}

    </content-header>
@endsection

@section('content')
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-red">500</h2>
            <div class="error-content">
                <h3><i class="fa fa-warning text-red"></i>{{ __('core.panel.tpl.500.msg') }}</h3>
                <p>{!! __('core.panel.tpl.500.msg_html') !!}</p>
                <form class="search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection


