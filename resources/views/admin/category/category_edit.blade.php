@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.category.update') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $category->id }}">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Category Name<span class="text-danger">*</span></label>
                        <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control"  placeholder="Enter category name">
                        @error('category_name')
                         <span class="text-danger">{{ $message }}</span>

                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Category description</label>
                        <textarea  class="form-control" name="category_description"  rows="5">{{ $category->category_description }}</textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                </div>
          </div>
        </div>{{-- end row --}}
      </div>
</section>
@endsection
