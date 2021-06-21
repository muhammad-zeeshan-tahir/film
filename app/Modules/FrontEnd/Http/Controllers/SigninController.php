<?php

namespace App\Modules\FrontEnd\Http\Controllers;

use App\Films;
use Illuminate\Http\Request;
use Session;
use App\Modules\Api\Models\Film;
use App\Modules\Api\Models\Genre;
use App\Modules\FrontEnd\Models\User;
use Auth;

class SigninController extends FrontEndController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function signin()
    {
        return view('FrontEnd::signin');
    }


    public function attenticate(Request  $request)
    {

        $rules = [
            "email"        =>   'required|email'  ,
        ];

        $validator = \Validator::make($request->all(), $rules,[
            //"name.required"=>"Select User Type"
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];
        $data['password'] = \Hash::make($password);

        $id =  Auth::attempt(['email' => $email, 'password' => $password ],true);
        $customer = Auth::user();
        if(isset($customer))
        {
            return redirect('frontend/films/');
        }

    }
}
