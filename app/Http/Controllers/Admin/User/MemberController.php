<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = User::where('role', 'customer')->orderBy('id', 'desc')->get();
        return view('admin.users.member', compact('members'));
    }

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
             
        $request->validate([
            'email'     => 'required|string|email|max:255|unique:users',
            'username'  => 'required|alpha_dash|max:20|unique:users,username',
            'password'  => 'required|string|min:8',
        ]);
        

        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $input['role'] = 'customer';
        $input['referrer_id'] = null;
        
        $user = User::create($input);

        return Redirect::route('members.index');
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
    public function edit($id)
    {
        $user = User::where('role', 'customer')->where('id', $id)->orderBy('id', 'desc')->limit(1);
        $user = User::find($id);
        return view('admin.users.edit-member', compact('user'));
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

        $request->validate([
            'email'     => 'required|string|email|max:255|unique:users,email,'.$id,
            'password'  => 'nullable|string|min:8',
        ]);

        $input = $request->all();    

        if(null !== $request->password){
            $input['password'] = Hash::make($request->password);
        }else{
            unset($input['password']);
        }

        $user->update($input);

        return Redirect::route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return Redirect::route('members.index');
    }

    public function bulkDestroy(Request $request)
    {
        $ids = explode(",", $request->member_ids);
        User::whereIn('id', $ids)->delete();
        return Redirect::route('members.index');
    }
}
