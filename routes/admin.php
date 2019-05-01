<?php
  Auth::routes();
Route::group(['middleware'=>['auth']] , function(){
  Route::resource('questions', 'QuestionController');
  Route::resource('answers', 'AnswerController');
  Route::get('response', 'ResponseController@index');

});
