<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Validation\Rule;
use DB;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function daftar_user(User $user){
        $users = $user->where('role', '!=','Admin')->sortable()->paginate(8);
        return view("admin.home",['users' => $users, 'i' => 1]);
    }

    public function create(){
        return view("admin.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>  'required',
            'email' => 'required|unique:users',
            'role' =>'required'
            
        ]);

        User::create([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'role' => $request->role,
            'password' => bcrypt("diskominfo")
        ]);

        return redirect()->route('admin_home')->with(['success' => 'User berhasil ditambahkan']);
    }

    public function edit( $id){
        $user = User::findOrFail($id);
        return view("admin.edit", ['user'=>$user]);
    }
    
    public function update(Request $request ,$id){
        $user  = User::find($id)->password;
        $request->validate([
            'name' =>  'required',
            'email' => ['required',Rule::unique('users')->ignore($id)],
            'role' =>'required',
            'password' => 'nullable|min:6'
            
        ]);

        User::find($id)->update([
            'name' => $request->name,
            'email' => strtolower($request->email),
            'role' => $request->role,
            'password' =>  $request->password != ''? bcrypt($request->password) : $user,
        ]);
        return redirect()->route('admin_home')->with(['success' => 'User berhasil diperbarui']);
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin_home')->with('deleted', 'User dengan ID : '. $id .' telah dihapus');
    }
}
