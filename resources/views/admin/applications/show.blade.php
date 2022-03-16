@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.application.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.applications.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.application.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $application->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.application.fields.one_signal_account') }}
                                    </th>
                                    <td>
                                        {{ $application->one_signal_account->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.application.fields.onesignal_app') }}
                                    </th>
                                    <td>
                                        {{ $application->onesignal_app }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.application.fields.rest_api_key') }}
                                    </th>
                                    <td>
                                        {{ $application->rest_api_key }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.application.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $application->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.application.fields.active_user') }}
                                    </th>
                                    <td>
                                        {{ $application->active_user }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.application.fields.enabled') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $application->enabled ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.applications.index') }}">
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