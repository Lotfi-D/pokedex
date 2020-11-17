<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as ResourcesUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::select('id','username' ,'profil_icon')->get();
        return $users->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (User::create($request->all())) {
            return response()->json([
                'success' => 'User créée avec succès'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new ResourcesUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->update([
            'name' => $request['name'],
            'username' => $request['username'],
            'profil_icon' => $request['profil_icon'],
            'email' => $request['email'],
            'password' => $request['password'],
            
        ])) {
            
                          
            return response()->json([
                'success' => 'User modifié avec succès'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function search(Request $request)
    {
        $s = $request->input('s');

        $user =User::latest()
        ->search($s)
        ->paginate(0);

        return compact('user','s');
    }
}
