<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $film_id) {
        $request->validate([
            'content' => 'required|min:3',
           'point' => 'required|numeric|min:1|max:10'
        ],
        [
            'required' => 'inputan :attribute harus diisi',
            'min' => 'Minimal 3 Karakter',
            'numeric' => 'Point harus berupa angka',
    
        ]);  
        $user_id = Auth::id();

        $reviews = new Review;
 
        $reviews->content = $request['content'];
        $reviews->point = $request['point'];
        $reviews->user_id = $user_id;
        $reviews->film_id = $film_id;
        
 
        $reviews->save();
 
        return redirect('/film/' . $film_id);
    }
}
