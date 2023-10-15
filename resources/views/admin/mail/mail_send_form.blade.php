@extends('admin.admin_master')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Mail Sending</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.mail.store') }}" method="POST">
                      @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label>Mail To<span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control"  placeholder="Enter receiver email address" required>

                      </div>

                      <div class="form-group">
                        <label>Subjet<span class="text-danger">*</span></label>
                        <input type="text" name="subject" class="form-control"  placeholder="Enter mail subject" required>

                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Message Body</label>
                        <textarea  class="form-control" name="message" placeholder="Enter your message" rows="5" required></textarea>
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                  </form>
                </div>
          </div>
        </div>{{-- end row --}}
      </div>
</section>
@endsection
