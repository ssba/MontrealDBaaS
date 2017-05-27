@extends('admin.main')

@section('title', $title )
@section('admin.user.databases.menu_activation_state', 'active' )

@section('content-header')
    <content-header :breadcrumbs="false">

        Edit DataBase
        <small> `{{ $database->name }}`</small>

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