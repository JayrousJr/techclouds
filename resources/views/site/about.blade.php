@include('/site/includes/header')

<!-- HOME -->
<section class="home-section section-hero overlay slanted" id="home-section">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <h1>About Us</h1>
                <div class="mx-auto w-75">
                    <p>We look forward to working with you and helping you take your business to the next level </p>
                </div>
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

<section class="site-section" id="next-section">
    <div class="container">
        <h2 class="section-title mb-3 text-center">What is TechClouds</h2>
        <div class="row align-items-center">
            <div class="col-lg-6 ml-auto">
                <p class="lead">Welcome to Techclouds, your one-stop-shop for all your web design, graphic design,
                    entertainment, and network security needs. </p>
                <p>We are a dynamic and innovative company based in Tanzania, dedicated to providing our clients with
                    the highest quality services and solutions.</p>
                <p>Our team of experts has years of experience in web design, graphic design, entertainment, and network
                    security. We understand the importance of having a strong online presence, and we strive to create
                    visually appealing and responsive websites that will help you stand out from the competition.</p>
            </div>
            <div class="col-lg-6 ml-auto">
                <p class="lead">Welcome to our company! We specialize in website design, entertainment, graphics, and
                    network security. Our team of experts has years of experience in these fields, and we are dedicated
                    to providing our clients with the best service possible.</p>
                <p>We pride ourselves on our customer service and attention to detail. Whether you're a small business
                    or a large corporation, we have the expertise to meet your needs. Contact us today to discuss your
                    project and see how we can help you succeed."</p>
            </div>
        </div>
    </div>
</section>

<!-- ABOUT US -->
<section class="site-section about-us-section">
    <div class="container">
        <h2 class="section-title mb-3 text-center">What do we do in here</h2>

        <div class="row mb-5 pt-0 site-section">
            <div class="col-md-6 align-self-center">
                <h2 class="section-title mb-3 ">Web Design</h2>
                <p class="lead">Our website design services include custom design, e-commerce solutions, and responsive
                    design for mobile devices. We also provide entertainment services such as game development and
                    animation production. Our graphics team is skilled in creating stunning visuals for websites, games,
                    and animations.</p>
            </div>
            <div class="col-md-6 align-self-center">
                <h2 class="section-title mb-3 ">Graphics Design</h2>
                <p class="lead">Our graphic design services include logo design, brochure design, packaging design, and
                    more. We are dedicated to creating beautiful and effective designs that will help you promote your
                    brand and connect with your target audience</p>
            </div>
            <div class="col-md-6 align-self-center">
                <h2 class="section-title mb-3 ">Entertainment</h2>
                <p class="lead">We also offer entertainment services, including music production, video production, and
                    event planning. Our team of talented professionals will work with you to create an unforgettable
                    experience for your audience.</p>
            </div>
            <div class="col-md-6 align-self-center">
                <h2 class="section-title mb-3 ">Network Security</h2>
                <p class="lead">We take network security very seriously and offer a range of services to protect your
                    business from cyber threats. We provide penetration testing, incident response, and security
                    consulting services to ensure your data is secure.</p>
            </div>

        </div>

        @include('/site/includes/ourproject')

    </div>
</section>

<section class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title mb-3">TechClouds Team</h2>
            </div>
        </div>

        <div class="row align-items-center block__69944">
            @foreach($members as $member)
            <div class="col-lg-3 col-sm-6 mb-5 about-single">
                <img src="{{$member->profile_photo_path ? '/storage/'. $member->profile_photo_path : '/storage/profile-photos/profile.jpg'}}" alt="Profile Image" class="img-fluid mb-4 mt-3" style="border-radius: 50%; width:90px; height: auto;">
                <h5>{{$member->name}}</h5>
                <p class="text-black">{{$member->profession}}</p>
                <div>
                    @foreach($member->languages as $language)
                    <span class="badge language">{{ $language }}</span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>


    </div>
</section>
@include('/site/includes/footer')