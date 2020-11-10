<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/api/movies/top-rated', 'MoviesController@topRated');
Route::get('/api/movies/movie-week', 'MoviesController@movieOfTheWeek');
Route::get('/api/movies/{id}', 'MoviesController@movieDetail');


///{path?} - it can be anything (based on regex in where) and laravel doesn't care about that, we just use it in react by useParams()
Route::view('/movie/{movie_id}/{path?}', 'movie-detail/movie-detail')->where(['movie_id' => '^\d+$', 'path' => '.*']);

// if no other route was matched until now, display the React app
Route::view('/{path?}', 'react-app')->where('path', '.*');