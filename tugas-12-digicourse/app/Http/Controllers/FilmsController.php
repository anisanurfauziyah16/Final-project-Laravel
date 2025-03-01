<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\genres;
use App\Models\Film;
use File;
class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index()
    {
        $film = Film::all();

        return view('film.index', ["film" => $film]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = genres::all();

        return view('film.create', ["genres" => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'summary' => 'required',
            'release_year' => 'required',
            'poster' => 'required|image|mimes:png,jpg,jpeg',
            'genre_id' => 'required|exists:genres,id'

        ],
        [
            'required' => 'Inputan :attribute wajib di isi.',
            'min' => 'Minimal 3 Karakter',
            'exists' => 'inputan :attribute tidak terdaftar',
            'poster' => 'inputan :attribute harus berupa gambar'
        ]);
        $filmPosterName = time() . '.' . $request->poster->extension();

        $request->poster->move(public_path('assets'), $filmPosterName);

        $film = new Film;
 
        $film->title = $request['title'];
        $film->summary = $request['summary'];
        $film->release_year = $request['release_year'];
        $film->poster = $filmPosterName;
        $film->genre_id = $request['genre_id'];
 
        $film->save();
 
        return redirect('/film');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = Film::find($id);

        return view('film.detail', ["film" => $film]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = Film::find($id);
        $genres = genres::all();

        return view('film.edit', ["film" => $film, "genres" => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'summary' => 'required',
            'release_year' => 'required',
            'poster' => 'image|mimes:png,jpg,jpeg',
            'genre_id' => 'required|exists:genres,id'

        ],
        [
            'required' => 'Inputan :attribute wajib di isi.',
            'min' => 'Minimal 3 Karakter',
            'exists' => 'inputan :attribute tidak terdaftar',
            'poster' => 'inputan :attribute harus berupa gambar'
        ]);
        
        $film = Film::find($id);

        if($request->has('poster')) {
            File::delete('assets/' . $film->poster);

            $filmPosterName = time() . '.' . $request->poster->extension();

            $request->poster->move(public_path('assets'), $filmPosterName);

            $film->poster = $filmPosterName;
        }

        $film->title = $request['title'];
        $film->summary = $request['summary'];
        $film->release_year = $request['release_year'];
        $film->genre_id = $request['genre_id'];

        $film->update();
        return redirect('/film');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::find($id);

        if($film->poster) {
            File::delete('assets/' . $film->poster);
        }

        $film->delete();
        
        return redirect('/film');
    }
}
