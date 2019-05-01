<?php

Route::get('/questions/{question}', 'QuestionController@show');
Route::get('/questions', 'QuestionController@index');
Route::post('/questions/submission', 'ResponseController@submit');
Route::get('/questions/respond/{answer}', 'ResponseController@respond');
