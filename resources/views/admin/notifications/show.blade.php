@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.notification.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.notifications.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $notification->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $notification->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.sub_title') }}
                                    </th>
                                    <td>
                                        {{ $notification->sub_title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.link') }}
                                    </th>
                                    <td>
                                        {{ $notification->link }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.icon') }}
                                    </th>
                                    <td>
                                        @if($notification->icon)
                                            <a href="{{ $notification->icon->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $notification->icon->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.notification.fields.image') }}
                                    </th>
                                    <td>
                                        @if($notification->image)
                                            <a href="{{ $notification->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $notification->image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.notifications.index') }}">
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