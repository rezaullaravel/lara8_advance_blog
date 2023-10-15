@extends('frontend.frontend_master')
@section('title')
Blog Single Page
@endsection

<style>
    .colorLove{
color: red;
font-size: 20px;
    }
</style>

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





                                    {{-- blog like dislike start --}}

                                      @if (Auth::check())
                                            @php
                                            $love = DB::table('post_likes')->where('user_id',Auth::user()->id)->where('blog_id',$blog->id)->first();
                                            @endphp


                                                @if($love)
                                                    <span class="text-muted text-capitalize mr-3">
                                                        <a href="{{ route('blog.dislike',$blog->id) }}"  class="btn text-danger">Love</a>

                                                    </span>
                                                @else

                                                <span class="text-muted text-capitalize mr-3">
                                                    <form action="{{ route('blog.like') }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <input type="hidden" name="blogId" value="{{ $blog->id }}">
                                                    <button type="submit" class="btn">Love</button>
                                                    </form>

                                                </span>
                                            @endif
                                      @endif


                                     {{-- blog like lislike end --}}



                            {{-- love count --}}
                            @php
                                $love_count = DB::table('post_likes')->where('blog_id',$blog->id)->get();
                            @endphp
                            @if (count( $love_count)>0)
                                 <span class="text-muted text-capitalize mr-3">
                                    <i class="las la-heart colorLove"></i>{{ count($love_count) }}
                                </span>
                            @endif

                            <span class="text-muted text-capitalize mr-3">
                                <i class="las la-user-circle"></i>
                                @if ($blog->user_type=='admin')
                                    {{ $blog->admin->name }}
                                @else
                                {{ $blog->user->name }}
                                @endif
                            </span>
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
