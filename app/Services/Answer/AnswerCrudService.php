<?php

namespace App\Services\Answer;

use DB;
use Log;
use Exception;
use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use Storage;
class AnswerCrudService
{
    public $request;
    public $question;

    public function __construct(Request $request, Question $question)
    {
        $this->request = $request;
        $this->question = $question;
    }

    public function createAnswers()
    {
        try {

            DB::beginTransaction();


            $answers = $this->request->get('answers');

            foreach($answers as $a) {
                $answer = $this->question->answers()->create([
                    'text' => $a['text'],
                    'answer_type' => $a['answer_type'],
                    'answer_sumbit_response_type' => $a['answer_sumbit_response_type'],
                    'answer_sumbit_response' => $a['answer_sumbit_response'],
                    'answer_sumbit_response_html' => $a['answer_sumbit_response_html'],
                ]);
                //Answer image storing
                if(isset($a['image'])){
                  $time = strtotime(date('Y-m-d'));
                  Storage::disk('local')->putFileAs(
                      '\public\answerImages',
                      $a['image'],
                      $time.$a['image']->getClientOriginalName()
                  );
                  $answer->update([
                      'image' =>   $time.$a['image']->getClientOriginalName()
                  ]);
                }
            }


            DB::commit();

            return true;

        } catch (Exception $e) {
            Log::error(['AnswerCrudService@createAnswers', ['an error occured while creating answers' => $e->getMessage()]]);
            DB::rollBack();
            return false;
        }
    }
    public function updateAnswers()
    {

        try {
            DB::beginTransaction();

            $answers = $this->request->answers;
            $deleteoldanswers = Answer::where('question_id',$this->question->id)->delete();
            if(!$deleteoldanswers){
              Log::error(['AnswerCrudService@createAnswers', ['an error occured while updating answers' => $e->getMessage()]]);
              DB::rollBack();
              return false;
            }

            foreach($answers as $a) {
                $answer = $this->question->answers()->create([
                    'text' => $a['text'],
                    'answer_type' => $a['answer_type'],
                    'answer_sumbit_response_type' => $a['answer_sumbit_response_type'],
                    'answer_sumbit_response' => $a['answer_sumbit_response'],
                    'answer_sumbit_response_html' => $a['answer_sumbit_response_html'],
                ]);

                if(isset($a['image'])){
                  $time = strtotime(date('Y-m-d'));
                  $store = Storage::disk('local')->putFileAs(
                      '\public\answerImages',
                      $a['image'],
                      $time.$a['image']->getClientOriginalName()
                  );
                  $answer->update([
                      'image' =>   $time.$a['image']->getClientOriginalName()
                  ]);
                }
            }


            DB::commit();

            return true;

        } catch (Exception $e) {
            Log::error(['AnswerCrudService@createAnswers', ['an error occured while updating answers' => $e->getMessage()]]);
            DB::rollBack();
            return false;
        }
    }
}
