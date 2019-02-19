<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUser($id){
        return $this->where('id', $id)->first();
    }
    public function addUser($data){
       
        $this->name = $data['name']; 
        $this->email = $data['email']; 
        $this->password = $data['password']; 
        $this->save();
    }

    public function updateUser($data){
    
        $user = $this->find($data['id']);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if(isset($data['password'])){
        	$user->password = Hash::make($data['password']);
        }
        $user->save();
    }

    public function deleteUser($id){
        $user = $this->find($id);
		$user->delete();
    }
    
}
