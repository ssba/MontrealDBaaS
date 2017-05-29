@extends('admin.main')

@section('title', $title )
@section('admin.user.databases.menu_activation_state', 'active' )

@section('content-header')
    <content-header :breadcrumbs="false">

        {{ $title }}
        <small></small>

    </content-header>
@endsection


@section('css')
    <link href="/css/alltables.css" rel="stylesheet">
@endsection

@section('js')
    <script src="/js/alltables.js"></script>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ $db->name }}</h3>
                    </div>
                    <div class="box-body">
                        <table id="TablesLists" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ __('core.panel.tpl.tables.name') }}</th>
                                <th>{{ __('core.panel.tpl.tables.charset') }}</th>
                                <th>{{ __('core.panel.tpl.tables.collation') }}</th>
                                <th>{{ __('core.panel.tpl.tables.comments') }}</th>
                                <th>{{ __('core.panel.tpl.tables.cache') }}</th>
                                <th>{{ __('core.panel.tpl.tables.updated_at') }}</th>
                                <th>{{ __('core.panel.tpl.tables.created_at') }}</th>
                                <th>{{ __('core.panel.tpl.tables.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($table as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->charset }}</td>
                                    <td>{{ $item->collation }}</td>
                                    <td>{{ $item->comment }}</td>
                                    <td>{{ $item->cache }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a class='ctrlPanel' title="{{ __('admin.getAllDBs_delete_db') }}" id="deleteTable" href="#" data-toggle="modal" data-target="#confirm-delete" data-href=" {{ route('DataBase:DeleteDataBase', ['userGUID' => Auth::user()->id, 'dbGUID' => $item->id]) }} "><i class='fa fa-trash'></i></a>
                                        <a class='ctrlPanel' title="{{ __('admin.getAllDBs_edit_db') }}" id="editTable" href=" {{ route('DataBase:ManageDataBase', ['userGUID' => Auth::user()->id, 'dbGUID' => $item->id]) }} "><i class='fa fa-pencil-square'></i></a>
                                        <a class='ctrlPanel' title="{{ __('admin.getAllDBs_tables_of_db') }}" id="gotoRows" href=" {{ route('DataTables:GetDataTables', ['userGUID' => Auth::user()->id, 'dbGUID' => $item->id]) }} "><i class='fa fa-empire'></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ __('core.panel.tpl.tables.name') }}</th>
                                <th>{{ __('core.panel.tpl.tables.charset') }}</th>
                                <th>{{ __('core.panel.tpl.tables.collation') }}</th>
                                <th>{{ __('core.panel.tpl.tables.comments') }}</th>
                                <th>{{ __('core.panel.tpl.tables.cache') }}</th>
                                <th>{{ __('core.panel.tpl.tables.updated_at') }}</th>
                                <th>{{ __('core.panel.tpl.tables.created_at') }}</th>
                                <th>{{ __('core.panel.tpl.tables.actions') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-xs-offset-3">
                <div class="box" id="create.database">
                    <div class="box-header">
                        <h3 class="box-title">{{ __('core.panel.tpl.databases.create_title') }}</h3>
                    </div>
                    <div class="box-body">
                        <create-table-form
                                uri="{{  route('DataTables:CreateDataTables', ['dbGUID' => $db->id]) }}"
                                method="post"
                                charset="{{ $db->charset }}"
                                collation="{{ $db->collation }}">
                        </create-table-form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="DeleteTable" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">{{ __('core.panel.tpl.tables.delete_modal.title') }}</h4>
                </div>

                <div class="modal-body">
                    <p>{{ __('core.panel.tpl.tables.delete_modal.msg') }}</p>
                    <p>{{ __('core.panel.tpl.tables.delete_modal.question') }}</p>
                    <p class="debug-url"></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('core.cancel') }}</button>
                    <a class="btn btn-danger btn-ok">{{ __('core.delete') }}</a>
                </div>
            </div>
        </div>
    </div>

@endsection

