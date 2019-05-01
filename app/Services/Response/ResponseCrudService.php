<?php

namespace App\Services\Response;

use DB;
use Log;
use Exception;
use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\Response;

class ResponseCrudService
{
    public $request;
    public $answer_id;
    public function __construct(Request $request , $answer_id = null)
    {
        $this->request = $request;
        $this->answer_id = $answer_id;
    }
    public function getAllResponses()
    {
      return Response::all();
    }

    public function createResponse()
    {
        try {
            DB::beginTransaction();

            $reponse = Response::create($this->request->only(['answer_id', 'question_id','email','username']));

            if (empty($reponse)) {
                Log::error(['ResponseCrudService@createQuestion', ['an error occured while saving reponse' => $e->getMessage()]]);
                DB::rollback();
                return null;
            }

            DB::commit();

            return true;

        } catch (Exception $e) {
            Log::error(['ResponseCrudService@createAnswers', ['an error occured while creating response' => $e->getMessage()]]);
            DB::rollBack();
            return false;
        }
    }

    public function getResponse()
    {

        try {

            DB::beginTransaction();

            $response = Answer::where('id',$this->answer_id)->first();
            if (empty($response)) {
                Log::error(['ResponseCrudService@createQuestion', ['an error occured while saving reponse' => $e->getMessage()]]);
                DB::rollback();
                return null;
            }

            DB::commit();

            return $response->answer_sumbit_response_html;

        } catch (Exception $e) {
            Log::error(['ResponseCrudService@createAnswers', ['an error occured while creating response' => $e->getMessage()]]);
            DB::rollBack();
            return false;
        }
    }
}
