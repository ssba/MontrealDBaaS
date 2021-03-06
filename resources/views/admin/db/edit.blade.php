@extends('admin.main')

@section('title', $title )
@section('admin.user.databases.menu_activation_state', 'active' )

@section('content-header')
    <content-header :breadcrumbs="false">

        Edit DataBase
        <small> `{{ $database->name }}`</small>

        <ol class="breadcrumb" slot="breadcrumbs">
            <li><a href="{{  route('Main:GetUserPage', ['userGUID' => Auth::user()->id])  }}"><i class="fa fa-home"></i> {{ __('core.panel.tpl.home.title') }}</a></li>
            <li><a href="{{  route('DataBase:GetAll', ['userGUID' => Auth::user()->id])  }}"><i class="fa fa-pie-chart"></i> {{ __('core.panel.tpl.databases.title') }}</a></li>
            <li class="active"><i class="fa fa-table"></i> {{ __('core.edit') }}</li>
        </ol>

    </content-header>
@endsection


@section('css')

@endsection

@section('js')

@endsection

@section('content')
    <section class="content">
        <div class="col-xs-6 col-xs-offset-3">
            <div class="box" id="create.database">
                <div class="box-body">
                    <edit-db-form
                            uri="{{  route('DataBase:ManageDataBaseAction', ['userGUID' => Auth::user()->id, 'dbGUID' => $database->id]) }}"
                            method="post"
                            name="{{ $database->name }}" charset="{{ $database->charset }}"
                            collation="{{ $database->collation }}" options="{{ $database->options }}"
                    ></edit-db-form>
                </div>
            </div>
        </div>
    </section>
@endsection