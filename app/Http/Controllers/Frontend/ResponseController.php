<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Response\SubmissionFormRequest;
use App\Services\Response\ResponseCrudService;

class ResponseController extends Controller
{
  public function submit(SubmissionFormRequest $request)
  {
    $response_crud_service =  new ResponseCrudService($request);
    $response = $response_crud_service->createResponse();
    return response()->json(['success' => true], 200);
  }
  public function respond(Request $request , $answer_id)
  {
    $response_crud_service =  new ResponseCrudService($request , $answer_id);
    $response = $response_crud_service->getResponse();
    return response()->json(['success'=>true , 'data' => $response], 200);

  }
}
