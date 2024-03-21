<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //index
    public function index(Request $request){
        //get users with pagination
        $users = DB::table('users')
        ->when($request->search, function ($query) use ($request){
            return $query->where('name', 'like', '%'.$request->search.'%');
        })->paginate(5);
        // $users = \App\Models\Users::all();
        return view('pages.user.index', compact('users'));
    }

    //create
    public function create(){
        return view('pages.user.create');
    }

    //store
    public function store(Request $request)
    {
        // validate the request...
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,staff',
        ]);

        // store the request...
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User created successfully');
    }

    //show
    public function show($id){
        return view('pages.user.show');
    }

    //edit
    public function edit($id){
        $user = User::find($id);
        return view('pages.user.edit', compact('user'));
    }

    //update
    public function update(Request $request, $id){
        // validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required|in:admin,staff',
        ]);

        //update the request
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        //if password is not empty
        if ($request->password) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    //delete
    public function destroy($id){
        // delete the request
        $user = User::find($id);
        $user-> delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
