<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
class AdminController extends Controller
{
    public function index() 
    {
        if(request()->ajax()) {
            $query = Admin::query();

            return DataTables::of($query)
                    ->order(function ($query) {
                        $query->orderBy('created_at', 'Desc');
                    })
                    ->addColumn('created_date', function ($admin) {
                        return Carbon::parse($admin->created_at)->format('d M, Y');
                    })
                    ->addColumn('name_email', function ($admin) {
                        return view('backend.admin.partials.admin_table_name_row', ['admin' => $admin]);
                    })
                    ->addColumn('action', function($admin) {
                        return view('backend.admin.partials.admin_table_action', ['admin' => $admin]);
                    })
                    ->rawColumns(['name_email', 'action', 'created_date'])
                    ->make(true);
        }

        return view('backend.admin.index');
    }

    public function create() : View
    {
        return view('backend.admin.create');
    }

    public function store(AdminRequest $request) : RedirectResponse
    {   
        $attributes = $request->validated();

        if($request->hasFile('profile') && $request->file('profile')->isValid()) {
            $file_name = uploadImage($request->file('profile'), 'public/images/profile/');
            $attributes['profile'] = $file_name;
        }

        Admin::create($attributes);

        return redirect()->route('admins.index')->with(['create_status' => 'Admin Successfully Created!']);
    }

    public function show(Admin $admin) : View
    {
        return view('backend.admin.detail', ['admin' => $admin]);
    }

    public function edit(Admin $admin) : View
    {
        return view('backend.admin.edit', ['admin' => $admin]);
    }

    public function update(AdminRequest $request, Admin $admin) : RedirectResponse
    {
        $attributes = $request->validated();

        if($attributes['password'] == null) {
            unset($attributes['password']);
        }

        if($request->hasFile('profile') && $request->file('profile')->isValid()) {
            $file_name = uploadImage($request->file('profile'), 'public/images/profile/');
            $attributes['profile'] = $file_name;
        }

        $admin->update($attributes);
        
        return redirect()->route('admins.index')->with(['update_status' => 'Admin Successfully Updated!']);
    }

    public function destroy(Admin $admin) : RedirectResponse
    {
        $admin->delete();
        return back()->with(['delete_status' => 'Admin Successfully Deleted!']);
    }
}
