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
            'email'=>'required|email|unique:users,email',
            'password' =>'required'
        ]);

        $data['name'] =  $request->input('name');  
        $data['email'] = $request->input('email');
        $data['password'] = $request->input('password'); 

        $userModel = new User();
        $userModel->addUser($data);            

        return redirect('/')->with('success','New user is added.');
    }

    public function viewEditablePost($id)
    {
        $userModel = new User();
        $user = $userModel->getUser($id);
        return view('editable',compact('user', 'id'));
    }

    public function editPost(Request $request, $id)
    {
        // validate user's input
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,
        ]);

        $data['id'] = $id;
        $data['name'] =  $request->input('name');  
        $data['email'] = $request->input('email');
        $data['password'] = $request->input('password'); 

        $userModel = new User();
        $userModel->updateUser($data);
        return redirect('/')->with('success','Record successfully modified.');
    }

    public function delete($id)
    {
    	$userModel = new User();
		$userModel->deleteUser($id);
		return redirect('/')->with('success','Record is deleted.');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }
}
