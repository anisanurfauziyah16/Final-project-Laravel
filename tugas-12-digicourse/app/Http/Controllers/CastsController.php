<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CastsController extends Controller
{
    public function create(){
        return view('casts.create');
    }

    public function store(request $request) {
        $request->validate([
            'name' => 'required|min:3',
            'age' => 'required',
            'Bio' => 'required',
        ],
        [
            'required' => 'Inputan :attribute wajib di isi.',
            'min' => 'Minimal 3 Karakter'
        ]);
        DB::table('casts')->insert([
            'name' => $request['name'],
            'age' => $request['age'],
            'Bio' => $request['Bio'],
        ]);
        return redirect('/casts');
    }
    public function index(){
        $casts = DB::table('casts')->get();

        return view('casts.index', ['casts' => $casts]);
    }
    public function show($id){
        $casts = DB::table('casts')->find($id);
        return view('casts.detail', ['casts' => $casts]);
    }
    public function edit($id){
        $casts = DB::table('casts')->find($id);
        return view('casts.edit', ['casts' => $casts]);
    }
    public function update(request $request, $id) {
        $request->validate([
            'name' => 'required|min:3',
            'age' => 'required',
            'bio' => 'required',
        ],
        [
            'required' => 'Inputan :attribute wajib di isi.',
            'min' => 'Minimal 3 Karakter'
        ]);
        DB::table('casts')
          ->where('id', $id)
          ->update([
            'name' => $request['name'],
            'age' => $request['age'],
            'bio' => $request['bio']
          ]);
          return redirect('/casts');
    }

    public function destroy($id){
        DB::table('casts')->where('id', $id)->delete();
        return redirect('/casts');
    }
}