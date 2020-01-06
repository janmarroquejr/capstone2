<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $deleted = User::onlyTrashed()->get();
        return view('super_admin.users', compact('users', 'deleted'));
    }

    public function deactivated()
    {
        $deleted = User::onlyTrashed()->get();
        return view('super_admin.deactivated', compact('deleted'));
    }

    // public function archive(){
    //     $deleted = User::onlyTrashed()->get();
    //     return view('super_admin.users', compact('deleted'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->contact_number = $request->contact_number;
        $user->email = $request->email;
        session()->flash('edited', 'Your account updated successfully!');
        $user->save();
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        return view('user.edituser', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $id)
    {
        $id->delete();
        return back();
    }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
        return back();
    }
}
