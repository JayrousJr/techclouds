@include('/site/includes/header')
<!-- HOME -->
<!--popup news-->
<!-- create an auto matic gnerated popup in the administrator dashboard-->

<!--popup news-->
<section class="home-section section-hero overlay slanted" id="home-section">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <h1>We Are {{config('company.name')}}</h1>
                <div class="mx-auto w-75">
                    <p>The home of outstanding computer solutions in Tanzania</p>
                </div>
                <p class="mt-5"><a href="contact" class="btn btn-outline-white btn-md ">Get in touch</a></p>
            </div>
        </div>
    </div>

    <!-- image ccontainer -->
    @include('/site/includes/imgcontainer1')
    <!-- image ccontainer -->

    <a href="#about-us-section" class="scroll-button smoothscroll">
        <span class="icon-arrow_downward"></span>
    </a>
</section>

<?php /*?><div class="popup" id="popup">
    <button id="close">&times;</button>
    <?php
  $parse1 = parse_ini_file('estro/account/configtitle.ini', FALSE, INI_SCANNER_RAW);
  $title = $parse1['popup_title'];

  $parse1 = parse_ini_file('estro/account/configcontent.ini', FALSE, INI_SCANNER_RAW);
  $content = $parse1['popup_content'];

  $parse1 = parse_ini_file('estro/account/configbutton.ini', FALSE, INI_SCANNER_RAW);
  $button = $parse1['popup_button'];
  ?>
    <h2><?php echo ucfirst($title); ?></h2>
    <p><?php echo ucfirst($content); ?></p>
    <a href="#" class="btn-ask" onclick="closePopup()"><?php echo (ucfirst($button)); ?></a>
</div><?php */ ?>

<!-- ABOUT US -->
<section class="site-section about-us-section" id="about-us-section">
    <div class="container">

        <div class="row mb-5 pt-0 site-section">
            <div class="col-md-6 align-self-center">
                <h2 class="section-title mb-4">Who Are You Guys</h2>

                <p>Welcome to Techclouds, your one-stop-shop for all your web design, graphic design, multimedia, and
                    network security needs. We are a dynamic and innovative company based in Tanzania, dedicated to
                    providing our clients with the highest quality services and solutions.</p>
                <p>We understand the importance of having a strong online presence, and we strive to create visually
                    appealing and responsive websites that will help you stand out from the competition.</p>
                <p class="mt-4"><a href="#" class="btn btn-outline-btn btn-md">Read more about us</a></p>
            </div>
            <div class="col-md-5 ml-auto img-overlap">
                <div class="img-1"><img src="/storage/images/bg/bg01.png" alt="Image" class="img-fluid img-shadow">
                </div>
                <div class="img-2"><img src="/storage/images/bg/bg02.png" alt="Image" class="img-fluid img-shadow">
                </div>
            </div>
        </div>

        @include('/site/includes/ourproject')

    </div>
</section>

<!-- SERVICES -->

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

                <a href='/cmwiO3TM6MzE6Imh0dCA6Ly9sb2NhHbGhvc3Q6ODAwMC9zZXJ2aWNlLTIiO31zOjY6Il9mbGUFzaC{{$service->id}}I7YTDoyOntzOjM6ImS9s'
                    class='block__16443 text-center d-block'>
                    <span class='custom-icon mx-auto'>
                        <!-- <span class='d-block'>{{$service->service_code}}</span> -->
                    </span>
                    <h3>{{$service->service_name}}</h3>
                    <p>{{$service->service_description}}</p>
                </a>

            </div>
            @endforeach
            @else
            <!-- if no project available display here-->
            <div class="item error-title mb-4 col-lg-12 ml-auto text-center" data-aos="fade">
                <i class="icon-trash-o text-danger"></i>
                <p class="text-danger">No Service is available for now</p>
            </div>
            @endif
            <!-- if no project available display here end-->
        </div>
    </div>
</section>


<!-- service -->
<!-- PORTFOLIO -->

<section class="site-section block__62272" id="portfolio-section">


    <div class="container">

        <div class="row mb-3">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title mb-3">Projects</h2>
            </div>
        </div>

        <div class="container">
            <div class='row justify-content-center mb-5' data-aos='fade-up'>
                <div id='filters' class='filters text-center button-group col-md-7'>
                    <button class='btn btn-primary active' data-filter='*'>All</button>
                    @foreach($class as $data)
                    <button class='btn btn-primary'
                        data-filter='.{{$data->service_class}}'>{{$data->service_name}}</button>
                    @endforeach
                </div>
            </div>

            <div id='posts' class='row no-gutter'>
                <!--query to fetch number of rows from the database-->
                @if($count > 0)
                @foreach($projects as $project)
                <div class='item {{$project->project_class}} col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4'>
                    <a href='/qdkFkcldLTVdDTWcyaEJYSWpRR01taOCI7czoY2OiJfZDmxhc2giO2ER6Mjp7{{$project->id}}czozOiJvbGQiO2E6MDAp7fXM6MYzoibmRV3IjthOjA6e319Uczo5OiJfcHS'
                        class='item-wrap'>
                        <span class='icon-add'></span>
                        <img class='img-fluid' src='/storage/{{$project->project_image}}'>
                    </a>
                </div>

                @endforeach
                @else
                <!-- if no project available display here-->
                <div class="item error-title mb-4 col-lg-12 ml-auto text-center" data-aos="fade">
                    <i class="icon-trash-o text-danger"></i>
                    <p class="text-danger">No project is available for now</p>
                    <p class="text-danger">Please hold on for a moment</p>
                </div>
                @endif
                <!-- if no project available display here end-->
            </div>
        </div>

    </div>

</section>

<!-- <section class="site-section block__45439 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
                <h3 class="section-title-sub text-primary">Read our recently events and news</h3>
                <h2 class="section-title mb-3">Blog Posts</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6 mb-4">
                <div class="block__86547 d-block d-xl-flex align-items-stretch">
                    <figure class="img" style="background-image: url('images/sq_img_1.jpg')">
                    </figure>
                    <div class="h-100">
                        <h3 class="mb-4"><a
                                href="ntzOjM6TM6MzE6Imh0dCA6Ly9sbJ2NO3HbG3Qmwi2DhaWNlLFza6OvcAwhcCYbTIiDoIUyO6{$blog->id}Il9mO31zOjG7YTImSMC9zZX9s">Undefined:
                                The Third Boolean Values</a></h3>
                        <div class="block__27192 d-flex pt-1 border-top">
                            <p><span class="icon-person"></span> Joyder Jovin</p>
                            <p><span class="icon-calendar-o"></span> 7 Apr 2019</p>
                            <p><span class="icon-chat"></span> 2</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 mb-4">
                <div class="block__86547 d-block d-xl-flex align-items-stretch">
                    <figure class="img" style="background-image: url('images/sq_img_4.jpg')">
                    </figure>
                    <div class="h-100">
                        <h3 class="mb-4"><a
                                href="ntzOjM6TM6MzE6Imh0dCA6Ly9sbJ2NO3HbG3Qmwi2DhaWNlLFza6OvcAwhcCYbTIiDoIUyO6{$blog->id}Il9mO31zOjG7YTImSMC9zZX9s">Where
                                Do You Learn HTML & CSS in 2020?</a></h3>
                        <div class="block__27192 d-flex pt-1 border-top">
                            <p><span class="icon-person"></span> Joyder Jovin</p>
                            <p><span class="icon-calendar-o"></span> 7 Apr 2019</p>
                            <p><span class="icon-chat"></span> 2</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> -->

@include('/site/includes/footer')