@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Edit Footer Left</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.footer-left.update') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $setting->id }}">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Footer Facebook Link<span class="text-danger">*</span></label>
                        <input type="text" name="footer_fb_link" value="{{ $setting->footer_fb_link }}" class="form-control" required>

                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Footer Twitter Link<span class="text-danger">*</span></label>
                        <input type="text" name="footer_twitter_link" value="{{ $setting->footer_twitter_link }}" class="form-control" required>

                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Footer Linkedin Link<span class="text-danger">*</span></label>
                        <input type="text" name="footer_linkedin_link" value="{{ $setting->footer_linkedin_link }}" class="form-control" required>

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
