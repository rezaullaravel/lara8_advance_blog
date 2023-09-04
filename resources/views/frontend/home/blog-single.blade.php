@extends('frontend.frontend_master')
@section('title')
Blog Single Page
@endsection

@section('main-content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="block text-center">
                <span class="text-white">Our blog</span>
                <h1 class="text-capitalize mb-5 text-lg">Blog Single Page</h1>
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
               <div class="col-lg-12 mb-5">
                  <div class="single-blog-item">
                     <img src="{{ asset( $blog->image) }}" alt="" class="img-fluid" width="500">
                     <div class="blog-item-content mt-5">
                        <div class="blog-item-meta mb-3">
                           <span class="text-muted text-capitalize mr-3"><i class="icofont-comment mr-2"></i> {{ count($comments) }} Comments</span>
                           <span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-2"></i>{{   $blog->created_at }}</span>
                        </div>
                        <h2 class="mb-4 text-md">{{ $blog->title }}</h2>
                        <p>{!!   $blog->description !!}</p>

                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                @comments(['model' => $blog])
               </div>
            </div>
         </div>
        @include('frontend.body.sidebar')
       </div>

    </div>
 </section>
@endsection
