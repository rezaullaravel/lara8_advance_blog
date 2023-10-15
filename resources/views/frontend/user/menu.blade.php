<div class="vertical-menu">
    <a href="{{ route('home') }}" class="{{  (request()->is('home')) ? 'active' : ''  }}">Home</a>
    <a href="{{ route('user.profile') }}" class="{{  (request()->is('user/profile')) ? 'active' : ''  }}">Profile</a>
    <a href="{{ route('profile.edit') }}" class="{{  (request()->is('profile/edit')) ? 'active' : ''  }}">Profile Update</a>
    <a href="{{ route('user.password.change') }}"  class="{{  (request()->is('user/password/password')) ? 'active' : ''  }}">Password Change</a>
    <a href="{{  route('user.blog.create') }}" class="{{  (request()->is('user/blog/create')) ? 'active' : ''  }}">Blog Post Create</a>
    <a href="{{  route('user.blog.list') }}" class="{{  (request()->is('user/blog/list')) ? 'active' : ''  }}">My Blog Post List</a>
</div>
