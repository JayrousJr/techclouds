@include('/site/includes/header')
<!-- HOME -->
<link href="includes/css/style.css">
<section class="home-section section-hero overlay slanted" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <h1>Gallery</h1>
            </div>
        </div>
    </div>

    <!-- image ccontainer -->
    @include('/site/includes/imgcontainer1')
    <!-- image ccontainer -->

    <a href="#next-section" class="smoothscroll scroll-button"> <span class=" icon-keyboard_arrow_down"></span> </a>
</section>
<section class="site-section" id="next-section">
    <div class="container">
        <div class="row no-gutters">
            @foreach($images as $image)
            <div class='col-md-6 col-lg-4 item'>
                <a href='/storage/{{$image->image}}' class='item-wrap fancybox' data-fancybox='gallery2'>
                    <span class='icon-search'></span>
                    <img class='img-fluid' src='/storage/{{$image->image}}'>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@include ('/site/includes/footer')