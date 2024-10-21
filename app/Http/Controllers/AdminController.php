<?php
namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
// to store the data using hash function we need to use :
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Check if admin is already logged in
        if ($request->session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard'); // Redirect to dashboard if logged in
        } else {
            return view('admin.login'); // Show login form if not logged in
        }
    }
    
    //  The below code is useful only in the case when the password doesnot contain hash value or it is directly stored
    // public function auth(Request $request)
    // {
    //     $email = $request->post('email');
    //     $password = $request->post('password');

    //     // Validate login credentials
    //     $result = Admin::where(['email' => $email, 'password' => $password])->get();

    //     if (isset($result['0']->id)) {
    //         $request->session()->put('ADMIN_LOGIN', true);
    //         $request->session()->put('ADMIN_ID', $result['0']->id);
    //         return redirect('admin/dashboard');
    //     } else {
    //         $request->session()->flash('error', 'Please enter valid login credentials');
    //         return redirect('admin');
    //     }
    // }

    // Now when we have stored the password using the hash function then we should use it as follows
    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        // Validate login credentials
        $result = Admin::where(['email' => $email])->first();

        if($result){
            if(Hash::check($password, $result->password)){
            $request->session()->put('ADMIN_LOGIN', true);
            $request->session()->put('ADMIN_ID', $result->id);
            return redirect('admin/dashboard');}
            else{
                $request->session()->flash('error', 'Please enter correct Password');
            return redirect('admin');

            }


        }
        else{
            $request->session()->flash('error', 'Please enter valid login credentials');
            return redirect('admin');

        }
    }

    // Just for knowledge
    // public function updatepassword()
    // {
    //     // to update the already entered password and after this go to route
    //     $r=Admin::find(1);
    //     $r->password=Hash::make('admin123');
    //     $r->save();
    //     // return view('admin.login');

    // }
    public function dashboard()
    {
        return view('admin.dashboard'); 
    }


}