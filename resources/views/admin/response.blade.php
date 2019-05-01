@extends('layouts.main')
@section('content')

  <div class="box">

            <div class="box-header">
              <h3 class="box-title">All Available Quizes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th style="width: 2%">#</th>
                    <th style="width: 8%">Response ID</th>
                    <th style="width: 20%">User name</th>
                    <th style="width: 20%">User Email</th>
                    <th style="width: 20%">Question</th>
                    <th style="width: 20%">Answer</th>
                  </tr>
                  @foreach ($All_reponses as $i=>$response)
                    <tr>
                      <td>{{$i+1}}</td>
                      <td>{{$response->id}}</td>
                      <td>{{$response->username}}</td>
                      <td>{{$response->email}}</td>
                      <td>{{$response->question_id}}</td>
                      <td>{{$response->answer_id}}</td>
                    </tr>
                  @endforeach

              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
