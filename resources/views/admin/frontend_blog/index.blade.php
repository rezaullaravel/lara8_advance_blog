@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h2 class="card-title">Blog List</h2>
                      </div>



                      <div class="card-body">
                         <div class="filter_result">
                            <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center">Sl no.</th>
                                        <th class="text-center">Crator Name</th>
                                        <th class="text-center">User Type</th>
                                        <th class="text-center">User Email</th>
                                        <th class="text-center">Category Name</th>
                                        <th class="text-center">Blog Title</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @foreach ($blogs as $key=>$row)

                                  <tr>
                                   <td>{{ $key+1 }}</td>
                                   <td>{{ $row->user->name }}</td>
                                   <td>{{ $row->user_type }}</td>
                                   <td>{{ $row->user->email }} </td>
                                   <td>{{ $row->category->category_name }}</td>
                                   <td>{{ $row->title }}</td>
                                   <td>
                                    @if ($row->status==0)
                                    <span class="btn text-danger">Pending</span>
                                   @endif

                                    @if ($row->status==1)
                                     <span class="btn text-success">Approved</span>
                                    @endif

                                    @if ($row->status==2)
                                    <span class="btn text-info">Rejected</span>
                                   @endif
                                   </td>

                                   <td>
                                    <img src="{{ asset($row->image) }}" width="80" alt="">
                                   </td>
                                    <td>
                                        <a href="{{-- route('admin.blog.details',$row->id) --}}" class="btn btn-info btn-sm" title="blog details"><i class="fas fa-eye"></i></a>

                                        <a href="{{-- route('admin.blog.delete',$row->id) --}}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="delete"><i class="fa fa-trash"></i></a>

                                        <a href="{{ route('admin.frontend.blog.approve',$row->id) }}" class="btn btn-info btn-sm m-2" >Approve</a>

                                        <a href="{{ route('admin.frontend.blog.reject',$row->id) }}" class="btn btn-primary btn-sm m-2" >Reject</a>

                                    </td>
                                  </tr>

                               @endforeach
                                </tbody>
                            </table>
                         </div>
                      </div>
                   </div>
                {{-- data table end --}}
            </div>
        </div>
    </div>
 </div>

@endsection
