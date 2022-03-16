<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOneSignalAccountRequest;
use App\Http\Requests\StoreOneSignalAccountRequest;
use App\Http\Requests\UpdateOneSignalAccountRequest;
use App\Models\OneSignalAccount;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OneSignalAccountController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('one_signal_account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OneSignalAccount::query()->select(sprintf('%s.*', (new OneSignalAccount())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'one_signal_account_show';
                $editGate = 'one_signal_account_edit';
                $deleteGate = 'one_signal_account_delete';
                $crudRoutePart = 'one-signal-accounts';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('enabled', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->enabled ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'enabled']);

            return $table->make(true);
        }

        return view('admin.oneSignalAccounts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('one_signal_account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.oneSignalAccounts.create');
    }

    public function store(StoreOneSignalAccountRequest $request)
    {
        $oneSignalAccount = OneSignalAccount::create($request->all());

        return redirect()->route('admin.one-signal-accounts.index');
    }

    public function edit(OneSignalAccount $oneSignalAccount)
    {
        abort_if(Gate::denies('one_signal_account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.oneSignalAccounts.edit', compact('oneSignalAccount'));
    }

    public function update(UpdateOneSignalAccountRequest $request, OneSignalAccount $oneSignalAccount)
    {
        $oneSignalAccount->update($request->all());

        return redirect()->route('admin.one-signal-accounts.index');
    }

    public function show(OneSignalAccount $oneSignalAccount)
    {
        abort_if(Gate::denies('one_signal_account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.oneSignalAccounts.show', compact('oneSignalAccount'));
    }

    public function destroy(OneSignalAccount $oneSignalAccount)
    {
        abort_if(Gate::denies('one_signal_account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $oneSignalAccount->delete();

        return back();
    }

    public function massDestroy(MassDestroyOneSignalAccountRequest $request)
    {
        OneSignalAccount::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
