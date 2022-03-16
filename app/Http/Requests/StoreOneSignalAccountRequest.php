<?php

namespace App\Http\Requests;

use App\Models\OneSignalAccount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOneSignalAccountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('one_signal_account_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:192',
                'required',
            ],
            'user_auth_key' => [
                'string',
                'max:192',
                'required',
                'unique:one_signal_accounts',
            ],
        ];
    }
}
