<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('application_edit');
    }

    public function rules()
    {
        return [
            'one_signal_account_id' => [
                'required',
                'integer',
            ],
            'onesignal_app' => [
                'string',
                'max:192',
                'required',
            ],
            'rest_api_key' => [
                'string',
                'max:192',
                'required',
            ],
            'name' => [
                'string',
                'max:192',
                'nullable',
            ],
        ];
    }
}
