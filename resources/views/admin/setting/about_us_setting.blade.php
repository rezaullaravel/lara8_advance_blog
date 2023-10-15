@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Edit About Us</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.about-us.update') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{ $setting->id }}">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">About Us Image<span class="text-danger">*</span></label>
                        <input type="file" name="about_img" class="form-control">
                        <img src="{{ asset($setting->about_img) }}" alt="" width="80" height="80">

                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">About Us Description<span class="text-danger">*</span></label>
                        <textarea name="about_description"  rows="6"  class="form-control">{{ $setting->about_description }}</textarea>

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
