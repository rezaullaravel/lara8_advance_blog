@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h2 class="card-title">Contact Message List</h2>
                      </div>

                      <div class="card-body">
                        <table  class="table table-striped table-bordered table-sm" style="width:100%">

                            <tbody>

                              <tr>
                                <th> Sender Name</th>
                                <td>{{ $contactMessage->name }}</td>
                              </tr>

                              <tr>
                                <th> Sender Email</th>
                                <td>{{ $contactMessage->email }}</td>
                              </tr>

                              <tr>
                                <th> Sender Phone</th>
                                <td>{{ $contactMessage->phone }}</td>
                              </tr>

                              <tr>
                                <th> Message Subject</th>
                                <td>{{ $contactMessage->subject }}</td>
                              </tr>

                              <tr>
                                <th> Message</th>
                                <td>{{ $contactMessage->message }}</td>
                              </tr>




                            </tbody>
                        </table>
                      </div>
                   </div>
                {{-- data table end --}}
            </div>
        </div>
    </div>
 </div>


@endsection
