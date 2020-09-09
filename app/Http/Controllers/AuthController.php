<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\User;
Use App\Uploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
 
class AuthController extends Controller
{
 
    public function index()
    {
        return view('login');
    }  
 
    public function registration()
    {
        return view('registration');
    }
     
    public function postLogin(Request $request)
    {
        request()->validate([
        'name' => 'required',
        'password' => 'required',
        ]);
 
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
        return Redirect::to("")->withSuccess('Oppes! You have entered invalid credentials');
    }
 
    public function postRegistration(Request $request)
    {  
        request()->validate([
        'name' => 'required',
        'password' => 'required|min:6',
        ]);
         
        $data = $request->all();
 
        $check = $this->create($data);
       
        return Redirect::to("")->withSuccess('Great! You have Successfully logged-in');
    }
     
    public function dashboard()
    {
 
      if(Auth::check()){
      	$users = User::where('level', 'guru')->get();
        $coba = Uploads::all();
      	$jadwals = Uploads::where('jadwal', ' ')->get();
        $marks = Uploads::where('status',' ')->get();
        $visors = User::where('level','supervisor')->get();
        return view('dashboard', compact('users','jadwals','visors','marks','coba',));
      }
       return Redirect::to("")->withSuccess('Opps! You do not have access');
    }
 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email'=> $data['inputEmail'],
        'password' => Hash::make($data['password']),
        'level' => $data['level']
      ]);
    }
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('');
    }
}