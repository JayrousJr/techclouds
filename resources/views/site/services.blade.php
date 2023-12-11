@include ('/site/includes/header')
@if(session('success'))
<div class="success" id="feddback">
    {{@session('success')}}
</div>
@endif
@if(session('error'))
<div class="error" id="feddback">
    {{@session('error')}}
</div>
@endif
<!-- HOME -->
<section class="home-section section-hero overlay slanted slanted-gray" id="home-section" style="display: block">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <h1>Services</h1>
                <div class="mx-auto w-75">
                    <p>Pick among of our best service here at TechClouds.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- image ccontainer -->
    @include ('/site/includes/imgcontainer3')
    <!-- image ccontainer -->

    <a href="#next-section" class="smoothscroll scroll-button">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>
</section>

<!-- SERVICES -->


<section class="site-section services-section bg-light block__62849" id="services-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title mb-3">Services</h2>
            </div>
        </div>
        <div class='row'>

            @if($count > 0)
            @foreach($services as $service)
            <div class='col-6 col-md-6 col-lg-4 mb-4 mb-lg-5'>

                <a href='/cmwiO3TM6MzE6Imh0dCA6Ly9sb2NhHbGhvc3Q6ODAwMC9zZXJ2aWNlLTIiO31zOjY6Il9mbGUFzaC{{$service->id}}I7YTDoyOntzOjM6ImS9s' class='block__16443 text-center d-block'>
                    <span class='custom-icon mx-auto'>
                        <span class='icon d-block'></span>
                    </span>
                    <h3>{{$service->service_name}}</h3>
                    <p>{{$service->service_description}}</p>
                </a>

            </div>
            @endforeach
            @else
            <!-- if no service available display here-->
            <div class="item error-title mb-4 col-lg-12 ml-auto text-center" data-aos="fade">
                <i class="icon-trash-o text-danger"></i>
                <p class="text-danger">No Service is available for now</p>
            </div>
            @endif
            <!-- if no service available display here end-->
        </div>
    </div>
</section>
<div class="" id="feeds"></div>
<div class="" id="feeds1"></div>
<div class="" id="feeds2"></div>
<div class="" id="feeds3"></div>

@include ('/site/includes/happypeople')

@include ('/site/includes/footer')