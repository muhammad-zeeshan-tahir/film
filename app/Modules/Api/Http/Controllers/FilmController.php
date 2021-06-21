<?php

namespace App\Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Modules\Api\Models\Film;
use App\Genre;
use App\Comment;
use App\User;

class FilmController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $draw = $request->input('draw');
        $start = $request->input('start');
        $length = $request->input('length');
        $page = (int)$start > 0 ? ($start / $length) + 1 : 1;
        $limit = (int)$length > 0 ? $length : 1;
        $columnIndex = $request->input('order')[0]['column']; // Column index
        $columnName = $request->input('columns')[$columnIndex]['data']; // Column name
        $columnSortOrder = $request->input('order')[0]['dir']; // asc or desc value
        $searchValue = $request->input('search')['value']; // Search value from datatable

        $countAll = Film::count();
        $paginate = Film::paginate($limit, ["*"], 'page', $page);

        //$paginate = Film::get()->all();
        $num = 1;
        $items = array();
        foreach ($paginate->items() as $idx => $row) {
            $items[] = array(
                "name" => $row['name'],
                "description" => $row['description'],
                "release_date" => $row['release_date'],
                "rating" => $row['rating'],
                "ticket_price" => $row['ticket_price'],
                "country" => $row['country'],
            );
            $num++;
        }

        $response = array(
            "draw" => (int)$draw,
            "recordsTotal" => (int)$countAll,
            "recordsFiltered" => (int)$paginate->total(),
            "data" => $items
        );
        return response()->json($response);

       // return response()->json(['status' => 'success', 'data'=> $data ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $genre_list = Genre::all();
        return view('backend/films.create')->withgenre($genre_list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
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
    public function show($id){
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
