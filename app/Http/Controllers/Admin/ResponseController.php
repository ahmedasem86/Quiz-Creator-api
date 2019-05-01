<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Response\ResponseCrudService;
use App\Response;
class ResponseController extends Controller
{
  public function index(Request $request)
  {
      $reponse_crud_service = new ResponseCrudService($request);
      $All_reponses = $reponse_crud_service->getAllResponses();
      return view('admin/response' , compact('All_reponses'));
  }
}
