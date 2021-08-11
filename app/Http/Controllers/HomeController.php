<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\Rule;
use App\Models\User; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profil(){
        $user = Auth::user();
        return view('edit-profil',['user' => $user]);
    }

    public function update_profil(Request $request ,$id){

        $request->validate([
            'name' =>  'required',
            'email' => ['required',Rule::unique('users')->ignore($id)],
            'password' => 'nullable|min:6'
            
        ]);

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  ($request->password != null)? bcrypt($request->password) : $this->password,
        ]);
        return back()->with(['success' => 'Profil berhasil diperbarui']);
    }
}
