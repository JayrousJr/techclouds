@include('/site/includes/header')



<!-- HOME -->
<section class="home-section section-hero overlay slanted" id="home-section">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <h1>Projects</h1>
            </div>
        </div>
    </div>

    <!-- image ccontainer -->
    @include('/site/includes/imgcontainer2')
    <!-- image ccontainer -->

    <a href="#next-section" class="smoothscroll scroll-button">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>

</section>

<section class="site-section bg-light block__62849" id="portfolio-section">
    <div class="container">

        <div class="row mb-3">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title mb-3">Projects</h2>
            </div>
        </div>

        <div class="container">
            <div class='row justify-content-center mb-5' data-aos='fade-up'>
                <div id='filters' class='filters text-center button-group col-md-7'>
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
@include ('/site/includes/happypeople')

@include ('/site/includes/footer')