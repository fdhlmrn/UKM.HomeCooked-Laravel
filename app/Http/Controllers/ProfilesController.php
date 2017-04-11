<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Profile;
use Illuminate\Support\Facades\Auth;


class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $profiles = Profile::where('user_id', Auth::user()->id)->get();
// dd($profiles);
        return view ('profile', compact('profiles'));
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
        $profile = Profile::findorFail($id);
        return view('editprofile', compact('profile'));
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
        // dd(User::first());
        $user = User::findOrFail($id);
        $profile = Profile::where('user_id', $id)->first();
          $user->name = $request->name;
          $user->email = $request->email;
          $profile->no_phone = $request->no_phone;
          $profile->address = $request->address;
          // $profile->state = $request->state;
          // $profile->no_tel = $request->no_tel;
          // $profile->subdistrict = $request->subdistrict;
          $user->save();
          $profile->save();

        return redirect()->action('ProfilesController@index')->withMessage('Profile has been successfully updated');

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
