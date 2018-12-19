<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    public function index()
    {
        return response()->json(Movie::all());
    }
    
    public function retrieve_with_paginate($paginator)
    {
        return response()->json(Movie::paginate($paginator));
    }
 
    public function show($id)
    {
        return Movie::find($id);
    }

    public function store(Request $request)
    {
        return Movie::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());

        return $movie;
    }

    public function delete(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return 204;
    }
}
