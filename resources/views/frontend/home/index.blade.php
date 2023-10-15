@extends('frontend.frontend_master')
@section('title')
Blog Home
@endsection

@section('main-content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="block text-center">
                <span class="text-white">Our blog</span>
                <h1 class="text-capitalize mb-5 text-lg">Blog articles</h1>
                <!-- <ul class="list-inline breadcumb-nav">
                   <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
                   <li class="list-inline-item"><span class="text-white">/</span></li>
                   <li class="list-inline-item"><a href="#" class="text-white-50">Our blog</a></li>
                   </ul> -->
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="section blog-wrap">
    <div class="container">
       <div class="row">
          <div class="col-lg-8">
             <div class="row">

                @foreach ($blogs as $row)

                @php
                    $comments = DB::table('comments')->where('commentable_id',$row->id)->get();
                @endphp
                    <div class="col-lg-12 col-md-12 mb-5">
                    <div class="blog-item">
                        <div class="blog-thumb">
                            <img src="{{asset($row->image)}}" alt="" class="img-fluid ">
                        </div>
                        <div class="blog-item-content">
                            <div class="blog-item-meta mb-3 mt-4">
                                <span class="text-muted text-capitalize mr-3"><i class="icofont-comment mr-2"></i>{{ count( $comments) }} Comments</span>
                                <span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-1"></i> {{ $row->created_at }} ({{ $row->view_post }} Views)</span>
                            </div>
                            <h2 class="mt-3 mb-3"><a href="{{ route('blog.single',$row->id) }}">{{ $row->title }}</a></h2>
                            <p class="mb-4">{!! Str::limit($row->description,50) !!}</p>
                            <a href="{{ route('blog.single',$row->id) }}"  class="btn btn-main btn-icon btn-round-full">Read More <i class="icofont-simple-right ml-2  "></i></a>
                        </div>
                    </div>
                    </div>
                @endforeach
             </div>
          </div>
        @include('frontend.body.sidebar')
       </div>

       <div>
         {{ $blogs->links() }}
       </div>
    </div>
 </section>
@endsection
