<?php

namespace App\Http\Controllers\Agent\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agent;
use Auth;
use Session;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('agent.auth:agent');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        return view('agent.changePassword.changePassword');
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

        
            $this->validate($request, [
                    'oldpassword'     => 'required',
                'newpassword'     => 'required|min:6',
                'confirmpassword' => 'required|same:newpassword',
            ]);

            $data = $request->all();

            if(!\Hash::check($data['oldpassword'], Auth::guard('agent')->user()->password)){

                 return back()->with('error','You have entered wrong password');

            }else{
                $agent = Auth::guard('agent')->user();
               Agent::where('id',$agent['id'])->update(['password'=> \Hash::make($request->newpassword)]);

            }
            Session::flash('success','Your profile password is changed');
            return back();
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
}
