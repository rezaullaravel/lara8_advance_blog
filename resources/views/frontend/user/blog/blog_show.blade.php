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
         <div class="col-md-3">
           @include('frontend.user.menu')
         </div>
         <div class="col-md-9">

                    @if (Session('info-message'))
                        <div class="alert alert-success">
                            <h4 class="text-center">{{ Session::get('info-message') }}</h4>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Sl no.</th>
                            <th scope="col">Blog Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $key=>$blog)
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $blog->title }}</td>
                                <td>
                                    <img src="{{ asset($blog->image) }}" alt="" width="80" height="80">
                                </td>
                                <td>
                                    @if ($blog->status=='0')
                                     <span class="btn text-danger">Pending</span>
                                    @endif

                                    @if ($blog->status=='1')
                                        <span class="btn text-success">Approved</span>
                                    @endif

                                    @if ($blog->status=='2')
                                     <span class="btn text-info">Rejected</span>
                                    @endif
                                </td>
                                <td width="45%">
                                    <a href="" class="btn btn-success btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                              </tr>
                            @endforeach

                        </tbody>
                      </table>

         </div>
      </div>
   </div>
@endsection



