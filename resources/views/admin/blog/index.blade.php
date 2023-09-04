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
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @foreach ($blogs as $key=>$row)

                                  <tr>
                                   <td>{{ $key+1 }}</td>
                                   <td>

                               <?php
                                    if ($row->user_type=='admin'){


                                        $user = App\Models\Admin::where('email',$row->user_email)->first();
                                        echo $user['name'];

                                    } else{
                                        $user2 = App\Models\User::where('email',$row->user_email)->first();
                                        echo $user2['name'];
                                    }

                                ?>


                                   </td>
                                   <td>{{ $row->user_type }}</td>
                                   <td>
                                    <?php
                                    if($row->user_type=='admin'){
                                        echo $row->admin->email;
                                    } else {
                                        echo $row->user->email;
                                    }
                                    ?>
                                   </td>
                                   <td>{{ $row->category->category_name }}</td>
                                   <td>{{ $row->title }}</td>
                                   <td>{!! Str::limit($row->description,50) !!}</td>
                                   <td>
                                    @if ($row->status==1)
                                        <a href="{{ route('admin.blog.status.deactive',$row->id) }}" class="bg-success btn-sm">Active</a>
                                    @else
                                    <a href="{{ route('admin.blog.status.active',$row->id) }}" class="bg-danger btn-sm">Deactive</a>
                                    @endif
                                   </td>

                                   <td>
                                    <img src="{{ asset($row->image) }}" width="80" alt="">
                                   </td>
                                    <td>
                                        <a href="{{ route('admin.blog.details',$row->id) }}" class="btn btn-info btn-sm" title="blog details"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin.blog.edit',$row->id) }}" class="btn btn-success btn-sm" title="edit"><i class="fa fa-pen"></i></a>
                                        <a href="{{ route('admin.blog.delete',$row->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="delete"><i class="fa fa-trash"></i></a>
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
