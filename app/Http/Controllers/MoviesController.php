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
        
        $movie_id = 1431045;
        $movie = Movie::query()
            ->with('genres')
            ->with('posters')
            ->with(['people' => function ($query) {
                $query->where('position_id', 'like', '256')->orderBy('priority', 'desc');
            }])
            ->findOrFail($movie_id);
            

        return $movie;
    }
    


}
