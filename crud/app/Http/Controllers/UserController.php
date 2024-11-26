<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public readonly User $user;


    public function __construct()
    {
        $this->user = new User();
    }


    public function index()
    {
        $users = $this->user->all();

        return view('users',['users' => $users]);
    }

  
    public function create()
    {
        return view('user_create');
    }

    public function store(Request $request)
    {
        $created = $this->user->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => password_hash($request->input('password'),PASSWORD_DEFAULT)
        ]);

        if($created)
        {
            return redirect()->back()->with('message','Successfully created');
        }

        return redirect()->back()->with('message','Error created');


    }

    
    public function show(string $id)
    {
        $object = $this->user->find($id);
        
        return view('user_show',['user' => $object]);

    }

  
    public function edit(string $id)
    {
        $object = $this->user->find($id);

        return view('user_edit',['user' => $object]);
    }

    public function update(Request $request, string $id)
    {
        $updated = $this->user->where('id',$id)->update($request->except(['_token','_method']));

        if($updated)
        {
            return redirect()->back()->with('message','Successfully updated');
        }

        return redirect()->back()->with('message','Error update');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->user->where('id',$id)->delete();

        return redirect()->route('users.index');

    }
}
