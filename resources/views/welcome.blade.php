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
                    <th style="width: 5%">#</th>
                    <th style="width: 35%">Quiz title</th>
                    <th style="width: 45%">Quiz description</th>
                    <th style="width: 15%">Status</th>

                  </tr>
                <tr>
                  <td>1.</td>
                  <td>First quiz</td>
                  <td>First Quiz description</td>

                  {{-- <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                  </td> --}}
                  <td><span class="badge bg-red">Solve</span></td>

                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
