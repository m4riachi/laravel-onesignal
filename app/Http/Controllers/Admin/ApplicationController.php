<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyApplicationRequest;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use App\Models\OneSignalAccount;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Application::with(['one_signal_account'])->select(sprintf('%s.*', (new Application())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'application_show';
                $editGate = 'application_edit';
                $deleteGate = 'application_delete';
                $crudRoutePart = 'applications';

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
            $table->addColumn('one_signal_account_name', function ($row) {
                return $row->one_signal_account ? $row->one_signal_account->name : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('active_user', function ($row) {
                return $row->active_user ? $row->active_user : '';
            });
            $table->editColumn('enabled', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->enabled ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'one_signal_account', 'enabled']);

            return $table->make(true);
        }

        return view('admin.applications.index');
    }

    public function create()
    {
        abort_if(Gate::denies('application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $one_signal_accounts = OneSignalAccount::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.applications.create', compact('one_signal_accounts'));
    }

    public function store(StoreApplicationRequest $request)
    {
        $application = Application::create($request->all());

        return redirect()->route('admin.applications.index');
    }

    public function edit(Application $application)
    {
        abort_if(Gate::denies('application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $one_signal_accounts = OneSignalAccount::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $application->load('one_signal_account');

        return view('admin.applications.edit', compact('application', 'one_signal_accounts'));
    }

    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $application->update($request->all());

        return redirect()->route('admin.applications.index');
    }

    public function show(Application $application)
    {
        abort_if(Gate::denies('application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->load('one_signal_account');

        return view('admin.applications.show', compact('application'));
    }

    public function destroy(Application $application)
    {
        abort_if(Gate::denies('application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->delete();

        return back();
    }

    public function massDestroy(MassDestroyApplicationRequest $request)
    {
        Application::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
