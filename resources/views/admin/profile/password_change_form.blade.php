@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
                @if(Session('success-message'))
                    <div class="alert alert-info text-center" role="alert">
                     {{ Session::get('success-message') }}
                    </div>
                @endif
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Password Change Form</h3>
                  </div>


                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.profile.password.update') }}" method="POST">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">New Password<span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                         <span class="text-danger">{{ $message }}</span>

                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Confirm New Password<span class="text-danger">*</span></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>

                       @enderror
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form>
                </div>
          </div>
        </div>{{-- end row --}}
      </div>
</section>
@endsection
