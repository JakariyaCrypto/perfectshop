<?php

namespace App\Http\Controllers\backend\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\pages\Admin;
use Validator;
use DB;
class AdminController extends Controller
{
    public function index(){
        return view('backend/auth/login');
    }

    // auth login
    public function login(Request $request){
       $request->validate([
            'email'=> 'required',
            'password'=> 'required',
        ]);

            $email = $request->post('email');
            $password = $request->post('password');

            // check avaiable auth
            $checkAuth = DB::table('admins')->where(['email'=>$email])->get();
                    // print_r(session()->get('loggedUserId'));exit;
            if (!isset($checkAuth[0])) {
                 return back()->with('danger','Your E-mai is Wrong'); 
            }else{
               if ($checkAuth[0]->password == $password) {
                      $request->session()->put('loggedUser',true);
                      $userId = $request->session()->put('loggedUserId',$checkAuth[0]->id);
                      
                      if (session()->get('loggedUserId')) {
                        return redirect()->route('admin.dashboard');
                      }
                    
                }else{
                    return back()->with('danger','Your Password is Wrong');
                }
            }
            // echo "<pre>";
            // print_r($checkAuth);
    }

// admin logout

    public function logout(){
        if(session()->exists('loggedUser')){
             session()->pull('loggedUser');
            return redirect('admin/login');
        }{
            return redirect()->route('admin.dashboard');
        }
    }


}
