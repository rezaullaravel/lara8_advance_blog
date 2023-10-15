<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
                @php
                    $setting = DB::table('settings')->where('id',1)->first();
                @endphp
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href=""><i class="icofont-support-faq mr-2"></i>{{   $setting->header_email }}</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>{{   $setting->header_address }}</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+23-345-67890" >
							<span>Call Now : </span>
							<span class="h4">{{   $setting->header_phone }}</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
            @php
                $logo = DB::table('settings')->where('id',1)->first();
            @endphp
		 	 <a class="navbar-brand" href="{{ url('/') }}">
			  	<img src="{{asset($logo->logo)}}" alt="" class="img-fluid" style="max-width: 80px; max-height:80px;">
			  </a>

		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarmain">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="{{ url('/') }}">Home</a>
			  </li>
			   <li class="nav-item"><a class="nav-link" href="{{ route('about.us') }}">About Us</a></li>

			   <li class="nav-item"><a class="nav-link" href="{{ route('frontend.contact') }}">Contact</a></li>

               <li class="nav-item"><a class="nav-link" href="{{ route('question.answer') }}">Question/Answer</a></li>

               @if (!Auth::check())
                <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
               @else
               <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Dashboard</a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
               @endif
			</ul>
		  </div>
		</div>
	</nav>
</header>
