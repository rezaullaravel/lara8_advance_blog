@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h2 class="card-title">Blog Details</h2>
                      </div>



                      <div class="card-body">
                         <div class="filter_result">
                            <table  class="table table-striped table-bordered table-sm" style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center" width="30%">Id</th>
                                        <td>{{ $blog->id }}</td>
                                    </tr>

                                    <tr class="text-center">
                                        <th class="text-center" width="30%">Category</th>
                                        <td>{{ $blog->category->category_name }}</td>
                                    </tr>

                                    <tr class="text-center">
                                        <th class="text-center" width="30%">Blog Title</th>
                                        <td>{{ $blog->title }}</td>
                                    </tr>

                                    <tr class="text-center">
                                        <th class="text-center" width="30%">Blog Description</th>
                                        <td>{!! $blog->description !!}</td>
                                    </tr>

                                    <tr class="text-center">
                                        <th class="text-center" width="30%">Blog Image</th>
                                        <td>
                                            <img src="{{ asset($blog->image) }}" alt="" width="200px">
                                        </td>
                                    </tr>

                                    <tr class="text-center">
                                        <th class="text-center" width="30%">Author</th>
                                        <td>
                                            @if ($blog->user_type == 'admin')
                                                {{ $blog->admin->name }}
                                            @else
                                            {{ $blog->user->name }}
                                            @endif
                                        </td>
                                    </tr>

                                    <tr class="text-center">
                                        <th class="text-center" width="30%">Author Email</th>
                                        <td>
                                            @if ($blog->user_type == 'admin')
                                                {{ $blog->admin->email }}
                                            @else
                                            {{ $blog->user->email }}
                                            @endif
                                        </td>
                                    </tr>

                                    <tr class="text-center">
                                        <th class="text-center" width="30%">Status</th>
                                        <td>
                                          @if ($blog->status==1)
                                              Active
                                          @else
                                              Deactive
                                          @endif
                                        </td>
                                    </tr>
                                </thead>
                                <tbody id="tbody">

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
