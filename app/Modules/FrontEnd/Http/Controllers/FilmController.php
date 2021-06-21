<?php

namespace App\Modules\FrontEnd\Http\Controllers;

use App\Films;
use Illuminate\Http\Request;
use Session;
use App\Modules\Api\Models\Film;
use App\Modules\Api\Models\Genre;
use App\Modules\FrontEnd\Models\Comment;
use App\User;

class FilmController extends FrontEndController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('FrontEnd::film');
    }

    public function create(){
        $genre = Genre::all();
        $data = ['genre'=>$genre];
        return view('FrontEnd::create',$data);
    }

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
            'name' => 'required|unique:film',
            'description' => 'required',
            'release_date' => 'required',
            'rating' => 'required',
            'ticket_price' => 'required',
            'country' => 'required',
            'genre_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $validator = \Validator::make($data, $rules);
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $getimageName = time().'.'.$request->photo->getClientOriginalExtension();

        $request->photo->move(public_path('upload_photos'), $getimageName);


        $data['photo'] = $getimageName;
        $id = null;
        $saveLeadCreationForm = Film::findOrNew($id);
        $saveLeadCreationForm->fill($data);
        $saveLeadCreationForm->save();
        return redirect()->back()->with('flash_message', 'Film has been added successfully !');
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
