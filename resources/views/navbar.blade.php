<!-- TIE UPS International Banner -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="{{ asset('assets/js/button_focus.js') }}"></script>

<div class="account-header p-2">
    @guest
    <a href="{{route('register')}}" id="register" class="btn-link">
        Register
    </a>
    <a href="{{route('login')}}" id="login" class="btn-link mx-2">
        Sign In
    </a>
    @endguest
    @auth
    <p class="mx-2 active">{{Auth::user()->name}},</p>
    <form action="{{route('logout')}}" method="POST">
    @csrf
        <button type="submit" class="btn-link" id="logout">Logout</button>
    </form>
    @endauth
</div>
<div class="header-image p-3">
    <a href="{{route('home')}}" class="img-center">
        <img src="http://itie-ups.com/wp-content/uploads/2017/07/TIMainLogo.jpg">
    </a>
</div>

<!-- Navigation Bar -->
<div class="myNavBar mb-3">
    <nav class="navbar justify-content-center navbar-expand-lg text-light">
            <a class="h1 nav-link mb-0" id="home" href="{{route('home')}}">Home</a>
            <div class="dropdown show">
                <a class="dropdown-toggle nav-link" href="#" role="button" id="about-us" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                About Us </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">TIE UPS Profile</a>
                    <a class="dropdown-item" href="#">Mission and Goals</a>
                </div>
            </div>
            <div class="dropdown show">
                <a class="dropdown-toggle nav-link" href="#" role="button" id="services" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                Services </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Collaborations</a>
                    <a class="dropdown-item" href="#">Recruitment</a>
                    <a class="dropdown-item" href="#">International Exhibitions</a>
                    <a class="dropdown-item" href="#">School Visits and Forums</a>
                    <a class="dropdown-item" href="#">Tours (Study, Cultural, Immersion)</a>
                </div>
            </div>
            <div class="dropdown show">
                <a class="dropdown-toggle nav-link" href="#" role="button" id="documentation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                Documentation</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">IIEF</a>
                    <a class="dropdown-item" href="#">Collaboration</a>
                    <a class="dropdown-item" href="#">Tours</a>
                </div>
            </div>
            <div class="dropdown show">
                <a class="dropdown-toggle nav-link" href="#" role="button" id="testimonials-india" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                Testimonials INDIA </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Rektors/University Reps</a>
                    <a class="dropdown-item" href="#">Parents</a>
                    <a class="dropdown-item" href="#">Students/Alumni</a>
                    <a class="dropdown-item" href="#">Foreign Students</a>
                </div>
            </div>
            <div class="dropdown show">
                <a class="dropdown-toggle nav-link " href="#" role="button" id="media" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                Media </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">2019 Media</a>
                    <a class="dropdown-item" href="#">2018 Media</a>
                    <a class="dropdown-item" href="#">2017 Media</a>
                </div>
            </div>
            <div class="dropdown show">
                <a class="dropdown-toggle nav-link" href="#" role="button" id="useful-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                Useful Info </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Belajar diIndia</a>
                    <a class="dropdown-item" href="#">INDIA</a>
                    <a class="dropdown-item" href="#">India-Indonesia Link</a>
                </div>
            </div>
            <a class="h1 nav-link mb-0" href="#" id="contact-us">Contact Us</a>
            <a class="h1 nav-link mb-0" href="#" id="beasiswa-2021">Beasiswa 2021</a>
    </nav>
</div>
