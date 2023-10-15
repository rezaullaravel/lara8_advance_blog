@extends('frontend.frontend_master')

@section('title')
    Blog Create
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
            <div class="card">
                @if (Session('info-message'))
                    <div class="alert alert-success">
                        <h4 class="text-center">{{ Session::get('info-message') }}</h4>
                    </div>
                @endif
                <div class="card-header">
                    <h4 class="text-center text-success">Blog Post Create</h4>
                </div>
                <div class="card-body">
                            <form action="{{ route('user.blog.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="card-body">
                                <div class="form-group">
                                <label>Select Category Name<span class="text-danger">*</span></label>
                                <select name="category_id" class="form-control" required>
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($blogCategories as $row)
                                        <option value="{{ $row->id }}">{{ $row->category_name }}</option>

                                    @endforeach
                                </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Blog title <span class="text-danger">*</span></label>
                                <input type="text" name="title"  class="form-control" placeholder="Enter blog title" required>

                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Blog description<span class="text-danger">*</span></label>
                                <textarea  class="form-control"  name="description"  rows="5" placeholder="Enter blog description" required></textarea>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputPassword1">Blog image <span class="text-danger">*</span></label>
                                <input type="file" name="image"  class="form-control" onchange="postImgUrl(this)">
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>

                                @enderror

                                <img src="" id="postImage" style="margin-top: 5px;">

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

{{-- javascript for blog post   image --}}
<script type="text/javascript">
    function postImgUrl(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
        $('#postImage').attr('src',e.target.result).width(300).height(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
    }
</script>
{{-- javascript for blog post image end --}}

