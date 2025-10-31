<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class UserController extends Controller
{
    //
    public function showUser()
    {
        // $user = DB::table('users')->get();
    $users = User::orderByDesc('id')->paginate(10);

        // $user = DB::table('users')->
        // where('age' , '>' , '20')
        // ->where('name' , 'like' , 'J%')
        // ->get();
        //    $user = db::table('users')->get();
        // dump($user);
        return view('users.users' , ['user'=> $users ]);
        // return response()->json($user);
    }


    public function showSingleUser(Request $request , $id)
    {
        $users = db::table('users')->find($id);
        // $users = db::table('users')->where('id',$id)->get();
        //where always return data in json format but find method always give in json method
        // dd($users);
        return view('users.single_user',['users' => $users]);
    }

    public function create()
    {
        $city = db::table('users')->distinct('city')->get();
        return view('users.create' , ['city' =>$city]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'age'   => 'required|integer|min:18|max:100',
            'city'  => 'required|string',
        ]);
        User::create($validated);
        return redirect()->route('users.create')->with('success', 'User created successfully!');
    }


    public function delete(Request $request , $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.create')->with('success', 'User Deleted successfully!');

    }


    public function edit(Request $request , $id)
    {   
         $user = User::find($id);
         return view('users.edit',['user'=>$user]);

    }


        public function update(Request $request , $id)
    {
          $user = User::find($id);

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'age'   => 'required|integer|min:18|max:100',
            'city'  => 'required|string',
        ]);
        $user->update($validated);
        return redirect()->route('get.single.edit' , $id)->with('success', 'User Updated successfully!');
    }
}

