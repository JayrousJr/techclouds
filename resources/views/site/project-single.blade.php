@include('/site/includes/header')

<!-- HOME -->
<section class="home-section section-hero image-bg overlay-2 slanted"
    style="background-image: url('images/sq_img_2.jpg')" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <p>More Details about the project</p>
                <h1>{{$project->project_name}}</h1>
                <div class="mx-auto w-75">
                </div>
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

<section class="site-section portfolio-single" id="next-section">

    <div class="container">
        <div class="row mb-5">
            <div class="col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-2">
                <strong class="d-block text-black">Client</strong>
                {{$project->Customer_Name}}
            </div>
            <div class="col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-4">
                <strong class="d-block text-black">Role</strong>
                {{$project->project_role}}
            </div>
            <div class="col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-2">
                <strong class="d-block text-black">Starting Date</strong>
                {{$project->date_to_start}}
            </div>
            <div class="col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-2">
                <strong class="d-block text-black">Ending Date</strong>
                {{$project->date_to_finish}}
            </div>
            <div class="col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-2">
                <strong class="d-block text-black">Project Status</strong>
                <a class="spepcial_link">{{$project->project_status }}</a>
            </div>
        </div>

        <div class="row mb-5 mt-5">
            <div class="col-lg-5 ml-auto h-100 jm-sticky-top">
                <!-- <div class="mb-5">
          <h3 class="mb-4 h4">Project Discription</h3>

          <p class="mb-0">{{$project->project_description}}</p>
        </div> -->

                <div class="block__87154 mb-0">
                    <blockquote>
                        <p>{{$project->Developer_Comments}}</p>
                    </blockquote>
                    <div class="block__91147 d-flex align-items-center">
                        <figure class="mr-4"><img src="/storage/{{$project->developer_image}}" alt="Image"
                                class="img-fluid"></figure>
                        <div>
                            <h3>{{$project->developer_name}}</h3>
                            <span class="position">Project Manager</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <figure>
                    <a href="/storage/{{$project->project_image}}" data-fancybox="gallery">
                        <img src="/storage/{{$project->project_image}}" alt="Image" class="img-fluid">
                    </a>
                </figure>

            </div>
        </div>

    </div>
</section>







@include('/site/includes/footer')