@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.oneSignalAccount.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.one-signal-accounts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oneSignalAccount.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $oneSignalAccount->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oneSignalAccount.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $oneSignalAccount->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oneSignalAccount.fields.user_auth_key') }}
                                    </th>
                                    <td>
                                        {{ $oneSignalAccount->user_auth_key }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.oneSignalAccount.fields.enabled') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $oneSignalAccount->enabled ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.one-signal-accounts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection