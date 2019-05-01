<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }
    public function reponse()
    {
        return $this->hasMany(Response::class, 'reponse_id');
    }
}
