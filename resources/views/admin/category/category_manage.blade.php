@extends('admin.admin_master')
@section('content')

 <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                {{-- data table --}}
                   <div class="card card-primary">
                      <div class="card-header">
                        <h2 class="card-title">Category List</h2>
                      </div>

                      <div class="card-body">
                        <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sl no.</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                               @foreach ($categories as $key=>$category)

                                  <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-success btn-sm" title="edit"><i class="fa fa-pen"></i></a>
                                        <a href="{{ route('admin.category.delete',$category->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                  </tr>

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
