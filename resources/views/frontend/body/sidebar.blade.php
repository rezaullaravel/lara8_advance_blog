
<style>
   .buttonStyle {
    border: none;
    color: white;
    padding: 9px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
    background-color: #008CBA;
    border-radius: 10px;

}
</style>


<div class="col-lg-4">
    <div class="sidebar-wrap pl-lg-4 mt-5 mt-lg-0">
       <div class="sidebar-widget search  mb-3 ">
          <h5>Search Here</h5>
          <form action="{{ route('blog.search') }}" method="GET">
            @csrf
            <div class="row">
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" placeholder="search here...." required>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="buttonStyle">Search</button>
                    </div>
            </div>
        </form>
       </div>
       <div class="sidebar-widget latest-post mb-3">
          <h5>Popular Posts</h5>
          @php
              $popularPost = DB::table('blogs')->where('view_post','>',0)->orderBy('view_post','desc')->limit(5)->get();
          @endphp

          @foreach ($popularPost as $post)
            <div class="py-2">
                <span class="text-sm text-muted">{{ $post->created_at }}</span>
                <h6 class="my-2"><a href="{{ route('blog.single',$post->id) }}">{{ $post->title }} ({{ $post->view_post }} views)</a></h6>
            </div>
          @endforeach

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
