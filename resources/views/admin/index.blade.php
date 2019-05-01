@extends('layouts.main')
@section('content')
  <div >
    <a href="/admin/questions/create" class="btn btn-primary" style="margin-bottom:5px;" role="button">New Question</a>
  </div>
  <div class="box">

            <div class="box-header">
              <h3 class="box-title">All Available Quizes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th style="width: 5%">#</th>
                    <th style="width: 35%">Quiz title</th>
                    <th style="width: 35%">Quiz description</th>
                    <th style="width: 10%">Edit</th>

                  </tr>
                  @foreach ($All_questions as $i=>$question)
                    <tr>
                      <td>{{$i+1}}</td>
                      <td>{{$question->title}}</td>
                      <td>{{$question->description}}</td>
                      <td><a href="/admin/questions/{{$question->id}}/edit"><i class="fa fa-edit"></i></a></td>

                    </tr>
                  @endforeach

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
