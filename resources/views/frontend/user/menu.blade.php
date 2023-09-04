<div class="vertical-menu">
    <a href="{{ route('home') }}" class="{{  (request()->is('home')) ? 'active' : ''  }}">Home</a>
    <a href="{{ route('user.profile') }}" class="{{  (request()->is('user/profile')) ? 'active' : ''  }}">Profile</a>
    <a href="{{ route('profile.edit') }}" class="{{  (request()->is('profile/edit')) ? 'active' : ''  }}">Profile Update</a>
    <a href="#">Password Change</a>
    <a href="#">Blog Post Create</a>
    <a href="#">My Blog Post List</a>
</div>
