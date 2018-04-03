<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use DB;
use Hash;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        //Atur permission dulu
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);   
        $this->middleware('permission:user-list', ['only' => ['index', 'show']]);    
        $this->middleware('permission:user-update', ['only' => ['edit', 'update']]);   
        $this->middleware('permission:user-delete', ['only' => ['show', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index(Request $request)
    {
        $users = User::orderBy('id','DESC')->get();
        $role = \App\Role::all();

        return view('users.index',compact('users','role'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name','id');
        return view('users.create',compact('roles')); //return the view with the list of roles passed as an array
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'roles' => 'required'
        ]);

        $input = $request->only('name', 'fullname', 'email', 'password');
        $input['password'] = Hash::make($input['password']); //Hash password

        $user = User::create($input); //Create User table entry

        //Attach the selected Roles
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->route('users.index')
            ->with('success','Berhasil membuat User baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get(); //get all roles
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('users.edit',compact('user','roles','userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'fullname' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'confirmed',
            'roles' => 'required'
        ]);


        $input = $request->only('name','fullname', 'email', 'password');
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']); //update the password
        }else{
            $input = array_except($input,array('password')); //remove password from the input array
        }

        $user = User::find($id);
        $user->update($input); //update the user info

        //delete all roles currently linked to this user
        DB::table('role_user')->where('user_id',$id)->delete();

        //attach the new roles to the user
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->route('users.index')
            ->with('success','Berhasil memperbarui User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        try{    
            User::find($id)->delete();
            return redirect()->route('users.index')
                ->with('success','Berhasil menghapus user');
        }catch(Exception $e){
            return redirect()->route('users.index')
                ->with('success','Pastikan tidak ada ketergantungan');
        }
       
    }

}