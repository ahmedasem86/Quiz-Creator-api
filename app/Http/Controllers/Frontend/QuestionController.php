<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Question\QuestionCrudService;

use App\Question;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $question_crud_service = new QuestionCrudService($request);
        $All_questions = $question_crud_service->getAllQuestions();
        return response()->json(['data' => $All_questions]);
    }

    public function show(Request $request, Question $question)
    {
        return response()->json(['data' => $question->load('answers')]);
    }

}
