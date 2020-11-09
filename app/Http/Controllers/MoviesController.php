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
    


}
