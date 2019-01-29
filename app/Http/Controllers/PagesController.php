<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;


class PagesController extends Controller
{
    private $perPage = 5;

    public function index()
    {
        $users = User::paginate($this->perPage);
    	return view('list')->with('users',$users);
    }

    public function getPost()
    {
    	return view('post');
    }

    public function addPost(Request $request)
    {
        // validate user's input
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password' =>'required'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        return redirect('/')->with('success','New user is added.');
    }

    public function viewEditablePost($id)
    {
        $user = User::where('id', $id)->first();
        return view('editable',compact('user', 'id'));
    }

    public function editPost(Request $request, $id)
    {

        // validate user's input
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
        ]);


        $user = new User();
        $user = $user->find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($request->input('password')){
        	$user->password = Hash::make($request->input('password'));
        }

        $user->save();
        return redirect('/')->with('success','Record successfully modified.');
    }

    public function delete($id)
    {
    	$user = User::find($id);
		$user->delete();
		return redirect('/')->with('success','Record is deleted.');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }
}
