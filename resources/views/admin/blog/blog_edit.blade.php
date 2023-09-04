@extends('admin.admin_master')
@section('content')


<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8 offset-sm-2">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Edit Blog</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="{{ route('admin.blog.update') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{ $blog->id }}">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Select Category Name<span class="text-danger">*</span></label>
                        <select name="category_id" class="form-control">
                            <option value="" selected disabled>Select</option>
                            @foreach ($categories as $row)
                              <option value="{{ $row->id }}" {{ $blog->category_id == $row->id  ? 'selected' : '' }}>{{ $row->category_name }}</option>

                            @endforeach
                        </select>
                        @error('category_id')
                         <span class="text-danger">{{ $message }}</span>

                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Blog title <span class="text-danger">*</span></label>
                        <input type="text" name="title" value="{{ $blog->title }}"  class="form-control" placeholder="Enter blog title" rows="5">

                        @error('title')
                          <span class="text-danger">{{ $message }}</span>

                         @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Blog description<span class="text-danger">*</span></label>
                        <textarea  class="form-control" id="editor1" name="description"  rows="5" >{{ $blog->description }}</textarea>
                        @error('description')
                          <span class="text-danger">{{ $message }}</span>

                         @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Blog image <span class="text-danger">*</span></label>
                        <input type="file" name="image"  class="form-control" onchange="postImgUrl(this)">
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>

                       @enderror

                        <img src="{{ $blog->image ? asset($blog->image) : '' }}" id="postImage" style="margin-top: 5px;">

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





    {{-- ck editor use locally --}}
    {{-- <script src="{{ asset('admin/ck-editor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script> --}}

    {{-- ck editor using cdn --}}
     <script src="https://cdn.ckeditor.com/4.22.1/standard-all/ckeditor.js"></script>
     <script type="text/javascript">
        CKEDITOR.replace('editor1', {
      extraPlugins: 'editorplaceholder',
      editorplaceholder: 'Enter blog description...',
      removeButtons: 'PasteFromWord'
    });
    </script>

    {{-- javascript for post   image --}}
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
    {{-- javascript for post image end --}}

@endsection
