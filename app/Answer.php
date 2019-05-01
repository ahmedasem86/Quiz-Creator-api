<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Response;

class Answer extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'text', 'image', 'answer_type', 'answer_sumbit_response_type', 'answer_sumbit_response','answer_sumbit_response_html'
    // ];
    protected $guarded = [];


    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
    public function reponse()
    {
        return $this->hasMany(Response::class, 'reponse_id');
    }
}
