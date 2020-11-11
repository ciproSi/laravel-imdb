<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\User;
class Review extends Model
{
    use HasFactory;

    public function movie () {
        return $this->belongsTo(Movie::class);
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

}
