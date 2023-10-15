 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin/dashboard') }}" class="brand-link">
      <img src="{{ asset('/') }}admin/dist/img/AdminLTELogo.png"  class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MyDashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/') }}admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('/admin/dashboard') }}" class="d-block">{{ Session::get('name') }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item {{ (request()->is('admin/category*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/category*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="{{ (request()->is('admin/category*')) ? 'display:block; overflow:hidden;' : 'display:none; overflow:hidden;' }} ">
              <li class="nav-item">
                <a href="{{ route('admin.category.add') }}" class="nav-link {{ (request()->is('admin/category/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.category.manage') }}" class="nav-link  {{ (request()->is('admin/category/manage')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ (request()->is('admin/blog*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/blog*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a href="{{ route('admin.blog.add') }}" class="nav-link {{ (request()->is('admin/blog/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.blog.manage') }}" class="nav-link {{ (request()->is('admin/blog/manage')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage blog</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item {{ (request()->is('admin/frontend/blog*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/frontend/blog*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Blog From Frontend
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a href="{{ route('admin.frontend.blog.manage') }}" class="nav-link {{ (request()->is('admin/frontend/blog/manage')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Frontend Blog</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item {{ (request()->is('admin/profile*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/profile*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a href="{{-- route('admin.blog.add') --}}" class="nav-link {{ (request()->is('admin/blog/add')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.profile.password.change') }}" class="nav-link {{ (request()->is('admin/profile/password/change')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- contact start --}}
          <li class="nav-item {{ (request()->is('admin/contact/message*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/contact/message*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Contact
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a href="{{ route('admin.contact-message.show') }}" class="nav-link {{ (request()->is('admin/contact/message/show')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Message</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- contact end --}}


          <li class="nav-item {{ (request()->is('admin/mail*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/mail*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Email
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a href="{{ route('admin.mail.sending') }}" class="nav-link {{ (request()->is('admin/mail/sending')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  Send Mail</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item {{ (request()->is('admin/setting*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/setting*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" >
              <li class="nav-item">
                <a href="{{ route('admin.setting.header') }}" class="nav-link {{ (request()->is('admin/setting/header')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Header Setting</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.setting.footer-left') }}" class="nav-link {{ (request()->is('admin/setting/footer-left')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Footer Left Setting</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.setting.logo') }}" class="nav-link {{ (request()->is('admin/setting/logo')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logo Setting</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.setting.about-us') }}" class="nav-link {{ (request()->is('admin/setting/about-us')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us Setting</p>
                </a>
              </li>
            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
