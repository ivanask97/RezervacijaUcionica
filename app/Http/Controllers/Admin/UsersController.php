<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Gate;

class UsersController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     if(Gate::denies('edit-users')){
        return redirect()->route('home')->with('error', 'Niste ovlašteni za gledanje korisnika');
    }
        $users=User::all(); 
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create_form(){
        return view('admin.users.create_form');
    }*/

    public function create( )
    {
        if(Gate::denies('edit-users')){
            return redirect()->route('admin.users.index')->with('error', 'niste ovlasteni za dodavanje korisnika');
        }
        $roles=Role::all();
        return view('admin.users.create_form')->with([
            'roles'=>$roles

        ]);
    }
    public function ispisi(){
        if(Gate::denies('profesori-users')){
            return redirect()->route('admin.users.index')->with('error', 'pogledajte korisnike');
        }
        $users=User::whereHas('roles',function($q){
            $q->whereIn('name',['profesor']);
        })->get();
        //$users=Role::with('users')->where('name','profesor')->get();
        return view('admin.users.profesori')->with('users',$users);
    }

    public function store(Request $request){
        $this->validate($request,array(
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id'=>['required'],
        ));
        $user=new User([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>Hash::make($request->get('password')),
            'role_id'=>$request->get('role_id')
        ]);
       
        $user->save();
        $role=$request->get('role_id');
        $user->roles()->attach($role);
        return redirect()->route('admin.users.index')->with('success', 'Korisnik spremljen');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
            return redirect(route('admin.users.index'));
        }
        $roles=Role::all();
        return view('admin.users.edit')->with([
            'user'=>$user,
            'roles'=>$roles

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,array(
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ));

        $user->roles()->sync($request->roles);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Korisnik je uređen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('admin.users.index'));
        }
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Korisnik je izbrisan');
    }
}
