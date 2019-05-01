<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Answer;
class Response extends Model
{
  protected $fillable = [
      'answer_id', 'question_id', 'email','username'
  ];
  public function question()
  {
      return $this->belongsTo(Question::class, 'question_id');
  }
  public function answer()
  {
      return $this->belongsTo(Answer::class, 'answer_id');
  }
}
