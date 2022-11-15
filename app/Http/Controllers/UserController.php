<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = User::get();
        return view('user.index')->with(['model' => $model]);
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'address' => 'required',
            'profile_photo' => 'image',
        ]);
        $fileName = null;
        if(!empty($request->file('profile_photo'))){
            $fileName = 'profile-'.time(). '-user.' .  $request->file('profile_photo')->getClientOriginalExtension();
            $request->file('profile_photo')->storeAs('public\uploads\profiles', $fileName);
        }
        $model = new User();
        $model->name = $request->name;
        $model->email = $request->email;
        $model->mobile = $request->mobile;
        $model->address = $request->address;
        $model->profile_photo = $fileName;
        if($model->save()){
            return redirect()->route('user.show', ['user'=>$model->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = User::find($id);
        return view('user.view')->with(['model' => $model]);
    }

    public function compress($id)
    {
        $model = User::find($id);
        $alldetails = $model->toArray();
        unset($alldetails['alldetails']);
        $model->alldetails = $alldetails;
        if($model->save()){
            return redirect()->route('user.show', ['user'=>$model->id]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::find($id);
        return view('user.edit')->with(['model' => $model]);
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'address' => 'required',
            'profile_photo' => 'image',
        ]);
        $model = User::find($id);
        $fileName = $model->profile_photo;
        if(!empty($request->file('profile_photo'))){
            $fileName = 'profile-'.time(). '-user.' .  $request->file('profile_photo')->getClientOriginalExtension();
            $request->file('profile_photo')->storeAs('public\uploads\profiles', $fileName);
        }
        $model->name = $request->name;
        $model->email = $request->email;
        $model->mobile = $request->mobile;
        $model->address = $request->address;
        $model->profile_photo = $fileName;
        if($model->save()){
            return redirect()->route('user.show', ['user'=>$model->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = User::find($id);
        if($model->delete()){
            return redirect()->route('user.index');
        }
        return redirect()->back();
    }
}
