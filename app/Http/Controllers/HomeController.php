<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;
// para verificar si un usuario esta authentificado
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //https://laravel.com/docs/5.0/authentication#retrieving-the-authenticated-user
    //https://stackoverflow.com/questions/17835886/laravel-authuser-id-tying-to-get-a-property-of-a-non-object
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login.get');
        }
        // Auth::User() tiene todos los valores del usuario autentificado
        //echo Auth::User()->id;
        //echo session('username');
        $id = Auth::User()->id;
        $user = \App\Usuario::find($id);
        return view('home');
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
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
}
