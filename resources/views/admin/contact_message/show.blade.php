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
                        <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl no.</th>
                                    <th>Sender Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($contactMessages as $key => $message)
                                @if ($message->view_status=='0')
                                <tr class="bg-info">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->phone }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ Str::limit($message->message,50) }}</td>
                                    <td>
                                        @if ($message->view_status==0)
                                            Not Seen.
                                        @else
                                          already viewd.
                                        @endif
                                    </td>
                                    <td>
                                      <a href="{{ route('contact.details',$message->id) }}" class="btn btn-info btn-sm m-2">Details</a>
                                      <a href="" class="btn btn-primary btn-sm m-2">Delete</a>
                                    </td>
                                 </tr>
                                @else
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->phone }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ Str::limit($message->message,50) }}</td>
                                    <td>
                                        @if ($message->view_status==0)
                                            Not Seen.
                                        @else
                                          already viewd.
                                        @endif
                                    </td>
                                    <td>
                                      <a href="{{ route('contact.details',$message->id) }}" class="btn btn-info btn-sm m-2">Details</a>
                                      <a href="" class="btn btn-primary btn-sm m-2">Delete</a>
                                    </td>
                                 </tr>
                                @endif

                               @endforeach




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
