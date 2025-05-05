<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::get();
        return view('admin',compact('admin'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }


    public function store(AdminRequest $request)
    {
         $this->save($request);
        return redirect()->route('greeting.index');
    }

    public function save(Request $request, $admin = null)
    {
        $admins = $admin ? Admin::find($admin->id) : new Admin();
        $admins->email = $request->email;
        $admins->password = bcrypt($request->password);
        $admins->phone = $request->phone;
        $admins->date = $request->date;
        $admins->save();
        return redirect()->route('greeting.index');
    }

    public function show(Admin $admin)
    {
        //
    }


    public function edit(Admin $admin)
    {
        return view('admin.create',compact('admin'));
    }


    public function update(AdminRequest $request, Admin $admin)
    {
        $this->save($request, $admin);
        return redirect()->route('greeting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
