@extends('frontend.frontend_master')

@section('title')
    Password Change
@endsection

<style>
        .vertical-menu {
        width: 200px;
        }

        .vertical-menu a {
        background-color: #eee;
        color: black;
        display: block;
        padding: 12px;
        text-decoration: none;
        }

        .vertical-menu a:hover {
        background-color: #ccc;
        }

        .vertical-menu a.active {
        background-color: #2c396c;
        color: white;
        }

        .tasklist{
            padding-left: 17rem;

           }

    </style>

@section('main-content')
   <div class="container" style="margin-bottom: 10px;">
      <div class="row">
         <div class="col-sm-4">
           @include('frontend.user.menu')
         </div>
         <div class="col-sm-8">
            @if (Session('info-message'))
                <div class="alert alert-success">
                    <h4 class="text-center">{{ Session::get('info-message') }}</h4>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center text-success">Password Change</h4>
                </div>
                <div class="card-body">
                            <form action="{{ route('user.password.update') }}" method="POST">
                                @csrf
                            <div class="card-body">


                                <div class="form-group">
                                   <label for="exampleInputPassword1"> New Password <span class="text-danger">*</span></label>
                                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputPassword1"> Confirm New Password <span class="text-danger">*</span></label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm New Password">
                                 </div>



                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>

                </div>
            </div>
         </div>
      </div>
   </div>
@endsection


