<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Person;

class MoviesController extends Controller
{
    public function topRated () {
        $movies = Movie::
            orderBy('rating', 'desc')
            ->take(10)
            ->get();

        return $movies;
    }
    
    public function movieOfTheWeek () {
        
        $movie = Movie::query()
            ->with('genres')
            ->with(['posters' => function ($query) {
                $query->limit(1);                
            }])
            ->with(['people' => function ($query) {
                $query->where('position_id', 'like', '254')->orderBy('priority', 'desc')->limit(3);
            }])
            ->inRandomOrder()
            ->first();
            

        return $movie;
    }

    public function movieDetail ($id) {

        $movie = Movie::query()
            ->with('genres')
            ->with(['posters' => function ($query) {
                $query->limit(1);                
            }])
            ->with(['people' => function ($query) {
                $query->where('position_id', 'like', '254')->orderBy('priority', 'desc')->limit(3);
            }])
            ->findOrFail($id);
        
        return $movie;
    }
    
    public function storeReview ($id, Request $request)
    {
        $this->validate($request, [
            'rating' => 'required',
            'text' => 'required'
        ]);
        
        $movie = Movie::findOrFail($id);
        $movie->reviews()->create($request->all());


        return [
            'status' => 'success'
        ];
    }


}
