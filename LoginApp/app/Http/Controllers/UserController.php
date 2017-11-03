<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request){
        $remember = $request->get('remember');
        $data = $request->only('email','password');
        if (Auth::attempt($data,$remember)){
            return view('dashboard');
        }
        return redirect()->back();
    }

    public function register(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $token = $request->input('token');
        $password = bcrypt($request->input('password'));

       // DB::insert('insert into users (name,email,password,remember_token) values (?, ?, ?, ?)', [$name,$email,$password,$token]);

        $result = DB::table('users')->insert([
            ['name' => $name,'email' =>$email,'password' => $password, 'remember_token'=> $token]
        ]);
    if ($result){
        return view('dashboard')->with('name', $name);
    }
        return redirect()->back();
    }

    public function reset_password_view(){
        return view('reset_password');
    }

    public function reset_password(Request $request){
      echo 'test reset';
    }

    public function remember_me(Request $request){
        echo 'test remember me';
    }
}
