@extends('frontend.frontend_master')

@section('title')
    User Profile Edit
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


    </style>

@section('main-content')
   <div class="container" style="margin-bottom: 10px;">
      <div class="row">
         <div class="col-sm-4">
           @include('frontend.user.menu')
         </div>
         <div class="col-sm-8">
            <div class="card">
                @if (Session('info-msg'))
                    <div class="alert alert-success">
                        <h3 class="text-center">{{ Session::get('info-msg') }}</h3>
                    </div>
                @endif
                <div class="card-header">
                    <h3>User Profile Edit</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id  }}">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                        </div>

                        <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                        </div>

                        <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image"  class="form-control" onchange="profileImgUrl(this)">
                                <img src="{{ $user->image ? asset($user->image) : '' }}" id="profileImage" style="margin-top: 5px;" width="80" height="80">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="Update"  class="btn btn-success btn-block">
                        </div>
                    </form>

                </div>
            </div>
         </div>
      </div>
   </div>
@endsection


{{-- javascript for profile image preview --}}
<script type="text/javascript">
    function profileImgUrl(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
        $('#profileImage').attr('src',e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
    }
</script>
{{-- javascript for profile image preview end --}}

