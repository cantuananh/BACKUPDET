<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = request()->all();
        $users = User::getAllUser($params);
        return $users;
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
    public function store(UserRequest $request)
    {
        User::create($request->all());
        return response()->json('The User successfully added');
    }

    public function show($id)
    {
        $User = User::find($id);
        return response()->json($User);
    }

    public function update($id, UserRequest $request)
    {
       
        $User = User::find($id);
        $User->update($request->all());
        return response()->json('The User successfully updated');
    }

    public function destroy($id)
    {
        $User = User::find($id);
        $User->delete();

        return response()->json('The User successfully deleted');
    }
}
