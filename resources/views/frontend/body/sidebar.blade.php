<div class="col-lg-4">
    <div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">
       <div class="sidebar-widget search  mb-3 ">
          <h5>Search Here</h5>
          <form action="#" class="search-form">
             <input type="text" class="form-control" placeholder="search">
             <i class="ti-search"></i>
          </form>
       </div>
       <div class="sidebar-widget latest-post mb-3">
          <h5>Popular Posts</h5>
          <div class="py-2">
             <span class="text-sm text-muted">03 Mar 2018</span>
             <h6 class="my-2"><a href="#">Thoughtful living in los Angeles</a></h6>
          </div>
          <div class="py-2">
             <span class="text-sm text-muted">03 Mar 2018</span>
             <h6 class="my-2"><a href="#">Vivamus molestie gravida turpis.</a></h6>
          </div>
          <div class="py-2">
             <span class="text-sm text-muted">03 Mar 2018</span>
             <h6 class="my-2"><a href="#">Fusce lobortis lorem at ipsum semper sagittis</a></h6>
          </div>
       </div>
       <div class="sidebar-widget category mb-3">
          <h5 class="mb-4">Categories</h5>
          <ul class="list-unstyled">
            @foreach ($categories as $category)
            @php
                $blogs = App\Models\Blog::where('category_id',$category->id)->get();
            @endphp
            <li class="align-items-center">
                <a href="{{ route('categorywise.blog',$category->id) }}">{{ $category->category_name }}</a>
                <span>({{ count($blogs) }})</span>
             </li>
            @endforeach
          </ul>
       </div>
    </div>
 </div>
