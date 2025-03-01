<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\genres;


class genresController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $genres = genres::all(); 
        return view('genres.index', compact('genres'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('genres.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        genres::create($request->all());
    
        return redirect()->route('genres.index')->with('success', 'Genre berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genres = genres::find($id);
        return view('genres.show', compact('genres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genres = genres::find($id);
        return view('genres.edit', compact('genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
          ]);
          $genres = genres::find($id);
        $genres->name = $request->name;
        $genres->update();
        return redirect('/genres');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genres = genres::find($id);
        $genres->delete();
        return redirect('/genres');
    }
}


   