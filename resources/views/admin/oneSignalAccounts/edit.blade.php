@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.oneSignalAccount.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.one-signal-accounts.update", [$oneSignalAccount->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.oneSignalAccount.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $oneSignalAccount->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oneSignalAccount.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user_auth_key') ? 'has-error' : '' }}">
                            <label class="required" for="user_auth_key">{{ trans('cruds.oneSignalAccount.fields.user_auth_key') }}</label>
                            <input class="form-control" type="text" name="user_auth_key" id="user_auth_key" value="{{ old('user_auth_key', $oneSignalAccount->user_auth_key) }}" required>
                            @if($errors->has('user_auth_key'))
                                <span class="help-block" role="alert">{{ $errors->first('user_auth_key') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oneSignalAccount.fields.user_auth_key_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('enabled') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="enabled" value="0">
                                <input type="checkbox" name="enabled" id="enabled" value="1" {{ $oneSignalAccount->enabled || old('enabled', 0) === 1 ? 'checked' : '' }}>
                                <label for="enabled" style="font-weight: 400">{{ trans('cruds.oneSignalAccount.fields.enabled') }}</label>
                            </div>
                            @if($errors->has('enabled'))
                                <span class="help-block" role="alert">{{ $errors->first('enabled') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.oneSignalAccount.fields.enabled_helper') }}</span>
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