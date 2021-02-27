<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructionsController extends Controller
{
//     Display a listing of the resource.
//     @return \Illuminate\Http\Response
    public function index()
    {
        $isAdmin=Auth::user() ? $this->isAdmin(Auth::user()->getAuthIdentifier()) : false;
        $isAuth=Auth::user() ? true : false;
        $instr=Instruction::index();
        return view('home', compact('instr','isAdmin','isAuth'));
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

//      Return is current user in role "Admin"
//      @param  int  $id
    public function isAdmin($id): bool{
        return User::isAdmin($id);
    }
}
