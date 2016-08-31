<?php

namespace App;

// use Illuminate\Foundation\Auth\UserInterface;
// use Illuminate\Foundation\Auth\Reminders\RemindableInterface;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use DB;
// class User extends Authenticatable
// {
//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var array
//      */
//     protected $fillable = [
//         'name', 'email', 'password',
//     ];

//     /**
//      * The attributes that should be hidden for arrays.
//      *
//      * @var array
//      */
//     protected $hidden = [
//         'password', 'remember_token',
//     ];
// }



 
class User extends Eloquent {
  

  protected $connection = 'mongodb';
  protected $collection = 'users';
  protected $hidden =  array("password");
  
  protected $fillable = ['email', 'name', 'password'];

  protected $errors;

  public function getErrors() {
    return $this->errors;
  }
  
  // public function test(){
  //  	$users = DB::collection('users')->get();
  //  	return DB::collection('users')->where('name', 'nikunj')->first();
  // }
 
}