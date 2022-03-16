@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.application.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.applications.update", [$application->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('one_signal_account') ? 'has-error' : '' }}">
                            <label class="required" for="one_signal_account_id">{{ trans('cruds.application.fields.one_signal_account') }}</label>
                            <select class="form-control select2" name="one_signal_account_id" id="one_signal_account_id" required>
                                @foreach($one_signal_accounts as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('one_signal_account_id') ? old('one_signal_account_id') : $application->one_signal_account->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('one_signal_account'))
                                <span class="help-block" role="alert">{{ $errors->first('one_signal_account') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.application.fields.one_signal_account_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('onesignal_app') ? 'has-error' : '' }}">
                            <label class="required" for="onesignal_app">{{ trans('cruds.application.fields.onesignal_app') }}</label>
                            <input class="form-control" type="text" name="onesignal_app" id="onesignal_app" value="{{ old('onesignal_app', $application->onesignal_app) }}" required>
                            @if($errors->has('onesignal_app'))
                                <span class="help-block" role="alert">{{ $errors->first('onesignal_app') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.application.fields.onesignal_app_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rest_api_key') ? 'has-error' : '' }}">
                            <label class="required" for="rest_api_key">{{ trans('cruds.application.fields.rest_api_key') }}</label>
                            <input class="form-control" type="text" name="rest_api_key" id="rest_api_key" value="{{ old('rest_api_key', $application->rest_api_key) }}" required>
                            @if($errors->has('rest_api_key'))
                                <span class="help-block" role="alert">{{ $errors->first('rest_api_key') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.application.fields.rest_api_key_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.application.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $application->name) }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.application.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('enabled') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="enabled" value="0">
                                <input type="checkbox" name="enabled" id="enabled" value="1" {{ $application->enabled || old('enabled', 0) === 1 ? 'checked' : '' }}>
                                <label for="enabled" style="font-weight: 400">{{ trans('cruds.application.fields.enabled') }}</label>
                            </div>
                            @if($errors->has('enabled'))
                                <span class="help-block" role="alert">{{ $errors->first('enabled') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.application.fields.enabled_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection