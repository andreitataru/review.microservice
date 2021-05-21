<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userIdReview', 'idReviewed', 'rating', 'type'
    ];
}
