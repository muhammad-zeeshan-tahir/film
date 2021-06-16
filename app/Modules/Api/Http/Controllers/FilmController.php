<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Films;
use App\Genre;
use App\Comment;
use App\User;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $film_list = Films::paginate(1);
        return view('backend/films.index')->withlist($film_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre_list = Genre::all();
        return view('backend/films.create')->withgenre($genre_list);
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
            'name' => 'required',
            'description' => 'required',
            'release_date' => 'required',
            'rating' => 'required',
            'ticket_price' => 'required',
            'country' => 'required',
            'genre_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $getimageName = time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('upload_photos'), $getimageName);
        //return back()->with('success','images Has been You uploaded successfully.')->with('image',$getimageName);

        $input = $request->all();
        $input['photo'] = $getimageName;
        Films::create($input);
        Session::flash('flash_message', 'Genre successfully added!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Films::findOrFail($id);
        //$film_id = $id;
        $comment_list = Comment::all();
        //print_r($comment_list);
        return view('backend/films.view',array('film'=>$film,'comment_list'=>$comment_list))->withfilm($film);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $films = Films::findOrFail($id);
        $genre_list = Genre::all();
        return view('backend/films.edit',array('films'=>$films,'genre_list'=>$genre_list));
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
        $films = Films::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'release_date' => 'required',
            'rating' => 'required',
            'ticket_price' => 'required',
            'country' => 'required',
            'genre_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $getimageName = time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('upload_photos'), $getimageName);
        //return back()->with('success','images Has been You uploaded successfully.')->with('image',$getimageName);

        $input = $request->all();
        $input['photo'] = $getimageName;
        //Films::create($input);

        $films->fill($input)->save();

        Session::flash('flash_message', 'Film updated successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo $id;
        $film = Films::findOrFail($id);

        $film->delete();


        //$film_list = Films::all();
        //Session::flash('flash_message', 'Film successfully deleted!');
        //return view('backend/films.index')->withlist($film_list);
    }
}
