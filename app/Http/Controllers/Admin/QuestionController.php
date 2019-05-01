<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Question\CreateQuestionFormRequest;
use App\Services\Question\QuestionCrudService;
use App\Question;
class QuestionController extends Controller
{
  public function index(Request $request)
  {
      $question_crud_service = new QuestionCrudService($request);
      $All_questions = $question_crud_service->getAllQuestions();
      return view('admin/index' , compact('All_questions'));
  }

  public function create()
  {
      return view('admin/create');
  }

  public function edit(Question $question)
  {
      return view('admin/edit',compact('question'));
  }
  public function update(CreateQuestionFormRequest $request, Question $question)
  {
    $question_crud_service = new QuestionCrudService($request , $question);
    $question = $question_crud_service->updateQuestion();
    if (empty($question)) {
      flash('Error occur while updating!!')->error();
    }
    flash('Quiz updated!')->success();
    return redirect('/admin/questions');
  }



    public function store(CreateQuestionFormRequest $request)
    {
        $question_crud_service =  new QuestionCrudService($request);
        $question = $question_crud_service->createQuestion();
        if (empty($question)) {
          flash('Error occur while creating quiz!!')->error();
        }
        flash('Quiz created!')->success();
        return redirect('/admin/questions');

        // return response()->json(['success' => true, 'data' => $question->load('answers')], 200);
    }
}
