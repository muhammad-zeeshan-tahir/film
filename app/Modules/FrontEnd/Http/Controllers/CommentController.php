<?php

namespace App\Modules\FrontEnd\Http\Controllers;

use App\Films;
use Illuminate\Http\Request;
use Session;
use App\Modules\Api\Models\Film;
use App\Modules\Api\Models\Genre;
use App\Modules\FrontEnd\Models\Comment;
use App\User;
use Auth;

class CommentController extends FrontEndController
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = [
            'name' => 'required',
            'comment' => 'required',
        ];

        $validator = \Validator::make($data, $rules);
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $user = Auth::user();

        $id = null;
        $data['user_id'] = $user['user_id'];
        $saveLeadCreationForm = Comment::findOrNew($id);
        $saveLeadCreationForm->fill($data);
        $saveLeadCreationForm->save();
        return redirect()->back()->with('flash_message', 'Comment has been added successfully !');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($name=null)
    {
        $data['data'] = Film::where('film.name',$name)
            ->select('film.*','film_genre.name as genre_name','comment.name as comment_name','comment.comment')
            ->leftjoin('film_genre','film.genre_id','=','film_genre.id')
            ->leftjoin('comment','film.id','=','comment.film_id')
            ->first()->toArray();

        $data['data']['comment'] = Comment::where('id',$data['data']['id'])->get()->toArray();
        return view('FrontEnd::view',$data);
    }
}
