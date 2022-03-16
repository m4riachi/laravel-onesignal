<?php

namespace App\Http\Requests;

use App\Models\OneSignalAccount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOneSignalAccountRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('one_signal_account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:one_signal_accounts,id',
        ];
    }
}
