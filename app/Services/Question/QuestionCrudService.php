<?php

namespace App\Services\Question;

use DB;
use Log;
use Exception;
use Illuminate\Http\Request;
use App\Question;
use App\Services\Answer\AnswerCrudService;
use Storage;
class QuestionCrudService
{
    public $request;
    public $question;
    public function __construct(Request $request , Question $question = null)
    {
        $this->request = $request;
        $this->question = $question;
    }

    public function getAllQuestions()
    {
      return Question::all();
    }

    public function createQuestion()
    {
        try {

            DB::beginTransaction();
            $question = Question::create($this->request->only(['title', 'description']));

            if (empty($question)) {
                Log::error(['QuestionCrudService@createQuestion', ['an error occured while creating question' => $e->getMessage()]]);
                DB::rollback();
                return null;
            }
            // storing the file into the local storage
            if(isset($this->request['image'])){
              $time = strtotime(date('Y-m-d'));
              Storage::disk('local')->putFileAs(
                  '\public\questionImages',
                  $this->request['image'],
                  $time.$this->request['image']->getClientOriginalName()
              );
              $question->update([
                  'image' =>   $time.$this->request['image']->getClientOriginalName()
              ]);
            }
            $answer_crud_service = new AnswerCrudService($this->request, $question);
            $success = $answer_crud_service->createAnswers();

            if ($success == false) {
                Log::error(['QuestionCrudService@createQuestion', ['an error occured while creating question' => $e->getMessage()]]);
                DB::rollback();
                return null;
            }

            DB::commit();

            return $question;

        } catch (Exception $e) {
            Log::error(['QuestionCrudService@createQuestion', ['an error occured while creating question' => $e->getMessage()]]);
            DB::rollBack();
            return null;
        }
    }
    public function updateQuestion()
    {
        try {
            $question = $this->question;
            DB::beginTransaction();
            $question = $question->update($this->request->only(['title', 'description']));

            if (empty($question)) {
                Log::error(['QuestionCrudService@createQuestion', ['an error occured while updating question' => $e->getMessage()]]);
                DB::rollback();
                return null;
            }
            // storing the file into the local storage
            if(isset($this->request['image'])){
              $time = strtotime(date('Y-m-d'));
              Storage::disk('local')->putFileAs(
                  '\public\questionImages',
                  $this->request['image'],
                  $time.$this->request['image']->getClientOriginalName()
              );
              $this->question->update([
                  'image' =>   $time.$this->request['image']->getClientOriginalName()
              ]);
            }

            $answer_crud_service = new AnswerCrudService($this->request, $this->question);
            $success = $answer_crud_service->updateAnswers();

            if ($success == false) {
                Log::error(['QuestionCrudService@createQuestion', ['an error occured while updating answes' => $e->getMessage()]]);
                DB::rollback();
                return null;
            }

            DB::commit();
            return $question;

        } catch (Exception $e) {
            Log::error(['QuestionCrudService@createQuestion', ['an error occured while updating answers' => $e->getMessage()]]);
            DB::rollBack();
            return null;
        }
    }
}
