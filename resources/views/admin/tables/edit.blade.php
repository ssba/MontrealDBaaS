@extends('admin.main')

@section('title', $title )
@section('admin.user.databases.menu_activation_state', 'active' )

@section('content-header')
    <content-header :breadcrumbs="false">

        Edit Table
        <small> `{{ $database->name }}`.`{{ $table->name }}`</small>

        <ol class="breadcrumb" slot="breadcrumbs">
            <li><a href="{{  route('Main:GetUserPage', ['userGUID' => Auth::user()->id])  }}"><i class="fa fa-home"></i> {{ __('core.panel.tpl.home.title') }}</a></li>
            <li><a href="{{  route('DataBase:GetAll', ['userGUID' => Auth::user()->id])  }}"><i class="fa fa-pie-chart"></i> {{ __('core.panel.tpl.databases.title') }}</a></li>
            <li><a href="{{ route('DataTables:GetDataTables', ['dbGUID' => $database->id]) }}"><i class="fa fa-table"></i> {{ __('core.panel.tpl.tables.title') }}</a></li>
            <li class="active"><i class="fa fa-pencil-square"></i> {{ __('core.edit') }}</li>
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
                    <edit-table-form
                            uri="{{  route('DataTables:ManageDataTableAction', ['dbGUID' => $database->id, 'tGUID' => $table->id]) }}"
                            method="post"
                            name="{{ $table->name }}"
                            charset="{{ $table->charset }}"
                            comment="{{ $table->comment }}"
                            cache="{{ $table->cache }}"
                    ></edit-table-form>
                </div>
            </div>
        </div>
    </section>
@endsection