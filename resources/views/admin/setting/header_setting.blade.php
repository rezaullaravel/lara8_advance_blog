@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Edit Header</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.header.update') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $setting->id }}">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Header Phone<span class="text-danger">*</span></label>
                        <input type="text" name="header_phone" value="{{ $setting->header_phone }}" class="form-control" required>

                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Header Address<span class="text-danger">*</span></label>
                        <textarea name="header_address" class="form-control" rows="4" required>{{ $setting->header_address }}</textarea>

                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Header Email<span class="text-danger">*</span></label>
                        <input type="text" name="header_email" value="{{ $setting->header_email }}" class="form-control" required>

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
