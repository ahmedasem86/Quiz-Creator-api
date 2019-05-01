@extends('layouts.main')
@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Update quiz - {{$question->title}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <form class="container" role="form" method="Post" action="{{ route('questions.update', [$question->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('put') }}

                      <div class="form-group">
                        <label >Quiz Title</label>
                        <input type="text" name="title" class="form-control" placeholder="title" value="{{$question->title}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Quiz Description</label>
                        <input type="text" name="description"  class="form-control" placeholder="description" value="{{$question->description}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">image</label>
                        <input type="file" name="image" class="form-control">
                      </div>
                      <div class="col-md-12">
                        <hr>
                        <h3>Answers</h3>
                     <div id='repeater' class="form-group m-form__group m--margin-top-10">
                            <div class="row">
                                <div data-repeater-list="answers" class="col-lg-10">
                                  @foreach ($question->answers as $answer)
                                    <div data-repeater-item class="row" style="margin-bottom:20px;">
                                      <div class="col-md-12">
                                        <div class="col-lg-2">
                                          <p>
                                            <label for="master-dropdown">
                                              Answer type
                                            </label>
                                            <select  class="answer_type form-control" name="answer_type" >
                                              <option value="0" {{($answer->answer_type == "0")? 'selected' : ''}}>Text Only</option>
                                              <option value="1" {{($answer->answer_type == "1")? 'selected' : ''}}>Text/image</option>
                                            </select>
                                          </p>
                                        </div>
                                        <div class="col-md-3 pr-0">
                                            <div class="input-group">
                                              <label for="">Text</label>
                                              <input class="form-control m-input" type="text" name="text" value="{{$answer->text}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-7 pr-0">
                                          <p>
                                            <label for="dependent-dropdown">
                                               Image
                                            </label>
                                            <input class="answer_image form-control m-input" type="file" name="image" value="http://quiz.loc/storage/questionImages/1556668800ZIvzSnaqWdPcPh1IvY6G_FireShot%20Capture%20013%20-%20Emirates%20NBD%20Egypt%20Barcelona%20Standard%20-%20www.emiratesnbd.com.eg.png">
                                          </p>
                                        </div>
                                        <div class="col-md-12">
                                          <hr>
                                        </div>
                                        <div class="col-md-3 pr-0">
                                          <label for="">Response type</label>
                                          <p>
                                          <select  name="answer_sumbit_response_type" class=" response_type form-control" required>
                                                <option value="0" {{($answer->answer_sumbit_response_type == "0")? 'selected' : ''}}>Redirect link</option>
                                                <option value="1" {{($answer->answer_sumbit_response_type == "1")? 'selected' : ''}}>Html view</option>
                                            </select>
                                          </p>
                                        </div>
                                        <div class="col-md-8">
                                          <div class="input-group">
                                            <p>
                                              <label for="">Response Link</label>
                                              <input class="response_redirect form-control m-input" type="text" name="answer_sumbit_response" value ={{$answer->answer_sumbit_response}}>
                                            </p>
                                          </div>
                                          <div class="input-group">
                                            <p>
                                              <label for="">Response HTML page</label>
                                              <textarea  class="answer_sumbit_response form-control m-input" type="text" name="answer_sumbit_response_html"   >{{$answer->answer_sumbit_response_html}}</textarea>
                                            </p>
                                          </div>

                                        </div>
                                        <div class="col-md-1">
                                          <a data-repeater-delete=""
                                             class="btn btn-danger m-btn m-btn--icon m-btn--icon-only col-md-12">X
                                              <i class="la la-remove"></i>
                                          </a>
                                        </div>
                                        <div class="col-md-12">
                                          <hr>
                                          <hr>
                                        </div>
                                      </div>
                                    </div>
                                  @endforeach

                                </div>
                            </div>
                            <div class="col-lg-2 pull-right">
                                <div id="repeater_add" data-repeater-create="" class="btn btn btn-primary m-btn m-btn--icon col-md-12" style="margin-bottom:5px;" >
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>
                                            Add Answer
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                      </div>

                <div class="box-footer col-md-12">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
