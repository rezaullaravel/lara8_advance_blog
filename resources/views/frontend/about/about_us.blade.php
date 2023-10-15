@extends('frontend.frontend_master')
@section('title')
About Us Page
@endsection



@section('main-content')
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="block text-center">
                <span class="text-white">About Us</span>
                <h1 class="text-capitalize mb-5 text-lg">About Us</h1>
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
 <section class="section">
    @php
    $setting = DB::table('settings')->where('id',1)->first();
   @endphp

	<div class="container">
      <div class="row">
         <div class="col-sm-12 about">
            <img src="{{ asset( $setting->about_img) }}" alt="" width="500">
            <p class="mt-3">{{ $setting->about_description }}</p>
         </div>

      </div>

	</div>
</section>
@endsection
