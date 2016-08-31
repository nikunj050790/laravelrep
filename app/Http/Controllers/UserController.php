<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\User;
use Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class UserController extends BaseController
{
   	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
   	protected $user;
	
   	public function __construct(User $user)
   	{
   	    $this->user = $user;
   	}

      protected function validator(array $data)
      {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
      }

   
   	public function index()
   	{
       return $this->user->test();
   	}

   	protected function getRegister()
   	{
   		return View('users.register');
   	}

   	protected function postRegister(RegisterRequest $request)
   	{
   		$this->user->name = $request->name;
         $this->user->email = $request->email;
         $this->user->password = bcrypt($request->password);
         
         if($this->user->save()){
            return redirect('users/login')->with('message', 'Signup Successfull!');
         } else {
            return redirect('users/login')->with('message', 'Signup Failed!');
         }
         
   	}
}