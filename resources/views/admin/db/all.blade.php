@extends('admin.main')

@section('title', $title )
@section('admin.user.databases.menu_activation_state', 'active' )

@section('content-header')
    <content-header :breadcrumbs="false">

        DataBases
        <small>Main list</small>

    </content-header>
@endsection


@section('css')
    <link href="/css/alldbs.css" rel="stylesheet">
@endsection

@section('js')
    <script src="/js/alldbs.js"></script>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">10 per page</h3>
                    </div>
                    <div class="box-body">
                        <table id="DataBaseAllLists" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Charset</th>
                                <th>Collation</th>
                                <th>Options</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->charset }}</td>
                                    <td>{{ $item->collation }}</td>
                                    <td>{{ $item->options }}</td>
                                    <td>
                                        <a class='ctrlPanel' title="{{ __('admin.getAllDBs_delete_db') }}" id="deleteDB" href="#" data-toggle="modal" data-target="#confirm-delete" data-href=" {{ route('DataBase:DeleteDataBase', ['userGUID' => Auth::user()->id, 'dbGUID' => $item->id]) }} "><i class='fa fa-trash'></i></a>
                                        <a class='ctrlPanel' title="{{ __('admin.getAllDBs_edit_db') }}" id="editDB" href=" {{ route('DataBase:ManageDataBase', ['userGUID' => Auth::user()->id, 'dbGUID' => $item->id]) }} "><i class='fa fa-pencil-square'></i></a>
                                        <a class='ctrlPanel' title="{{ __('admin.getAllDBs_tables_of_db') }}" id="gotoTbl" href=" {{ route('DataBaseTables:GetDataTables', ['userGUID' => Auth::user()->id, 'dbGUID' => $item->id]) }} "><i class='fa fa-table'></i></a>
                                        <a class='ctrlPanel' title="{{ __('admin.getAllDBs_edit_cache_of_db') }}" id="DBcache" href=" {{ route('DataBase:ManageDataBase', ['userGUID' => Auth::user()->id, 'dbGUID' => $item->id]) }} "><i class='fa fa-archive'></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Charset</th>
                                <th>Collation</th>
                                <th>Options</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-xs-offset-3">
                <div class="box" id="create.database">
                    <div class="box-header">
                        <h3 class="box-title">Create new DataBase</h3>
                    </div>
                    <div class="box-body">
                        <create-db-form uri="{{  route('DataBase:CreateDatabase', ['userGUID' => Auth::user()->id]) }}" method="post"></create-db-form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>

                <div class="modal-body">
                    <p>You are about to delete one track, this procedure is irreversible.</p>
                    <p>Do you want to proceed?</p>
                    <p class="debug-url"></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>

@endsection