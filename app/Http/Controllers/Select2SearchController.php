<?php

namespace App\Http\Controllers;
use App\Movie;
use Illuminate\Http\Request;

class Select2SearchController extends Controller
{

    public function index()
    {
    	return view('home');
    }

    public function selectSearch(Request $request)
    {
    	$movies = [];

        if($request->has('q')){
            $search = $request->q;
            $movies =Movie::select("id", "name")
            		->where('name', 'LIKE', "%$search%")
            		->get();
        }
        return response()->json($movies);
    }
}
