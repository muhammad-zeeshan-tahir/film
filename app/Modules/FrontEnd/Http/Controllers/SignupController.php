<?php

namespace App\Modules\FrontEnd\Http\Controllers;

use App\Films;
use Illuminate\Http\Request;
use Session;
use App\Modules\Api\Models\Film;
use App\Modules\Api\Models\Genre;
use App\Modules\FrontEnd\Models\User;

class SignupController extends FrontEndController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function signup()
    {
        return view('FrontEnd::signup');
    }

    public function store(Request  $request)
    {
        $data = $request->all();
        $rules = [
                    'name' => 'required',
                    'email'      => 'required|email',
                    'password'   => 'required',
        ];

        $validator = \Validator::make($data, $rules);
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $id = null;
        $password = $data['password'];
        $data['password'] = \Hash::make($password);
        $saveUserForm = User::findOrNew($id);
        $saveUserForm->fill($data);
        $saveUserForm->save();

        return redirect()->back()->with('flash_message', 'user has been registered successfully !');
        return view('FrontEnd::signup');
    }
}
