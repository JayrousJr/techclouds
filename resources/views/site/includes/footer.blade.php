<footer class="site-footer slanted-footer">

    <a href="#top" class="smoothscroll scroll-top" id="scroll-top">
        <span class="icon-arrow_upward"></span>
    </a>

    <div class="container">
        <div class="row mb-5">
            <div class="col-6 col-md-3 mb-4 mb-md-0">
                <h3>TechClouds Products</h3>
                <ul class="list-unstyled">
                    <li><a href="{{url('/services')}}">Web Design</a></li>
                    <li><a href="{{url('/services')}}">Graphic Design</a></li>
                    <li><a href="{{url('/services')}}">Web Developers</a></li>
                    <li><a href="{{url('/services')}}">Network Security</a></li>
                    <li><a href="{{url('/services')}}">Mobile Applications</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 mb-4 mb-md-0">
                <h3>Company</h3>
                <ul class="list-unstyled">
                    <li><a href="about">About Us</a></li>
                    <!-- <li><a href="#">Career</a></li>
                    <li><a href="#">Resources</a></li> -->
                </ul>
            </div>
            <div class="col-6 col-md-3 mb-4 mb-md-0">
                <h3>Support</h3>
                <ul class="list-unstyled">
                    <!-- <li><a href="#">Support</a></li>
                    <li><a href="faq">FAQ's</a></li> -->
                    <li><a href="{{route('policy.show')}}">Policies</a></li>
                    <li><a href="{{route('terms.show')}}">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 mb-4 mb-md-0">
                <h3>Contact Us</h3>
                <div class="footer-social">
                    @foreach($socialnetwork as $data)
                    <a href="{{$data->link}}"><span class="icon-{{$data->icon}}"></span></a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row text-center">
            <div class="col-md-6 col-s-12 ">
                <p class="copyright">Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                    </script>
                </p>
            </div>
            <div class="col-md-6 col-s-12 ">
                <p class="copyright"> Designed by TechClouds Team</p>
            </div>
        </div>
    </div>
</footer>

</div>

<script src="assets/assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/assets/styles/bootstrap4/popper.js"></script>
<script src="assets/assets/styles/bootstrap4/bootstrap.min.js"></script>
<script src="assets/assets/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="assets/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="assets/assets/plugins/easing/easing.js"></script>
<script src="assets/assets/js/custom.js"></script>
<script src="assets/js/ajax-form.js"></script>
<!--contact js-->
<script src="assets/js/contact.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/jquery.form.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/mail-script.js"></script>
<!-- SCRIPTS -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/stickyfill.min.js"></script>
<script src="assets/js/jquery.fancybox.min.js"></script>
<script src="assets/js/jquery.easing.1.3.js"></script>

<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.animateNumber.min.js"></script>

<script src="assets/js/custom.js"></script>
<script src="assets/js/action.js"></script>
<script src="assets/js/popup.js"></script>
<script src="assets/js/parsley.min.js"></script>
<script src="assets/js/phones.js"></script>

<!--contact js-->
<script src="assets/js/contact.js"></script>
<script src="assets/js/jquery.ajaxchimp.min.js"></script>
<script src="assets/js/jquery.form.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/mail-script.js"></script>
<script src="assets/js/main.js"></script>

<!-- <script src="https://chatbolt.ai/widget/addee1f1-f0af-44f6-b0a8-fd721c0acdea.js"></script> -->

<script>
$(document).ready(function() {
    //hide the notification after 2seconds  
    setTimeout(function() {
        $("#notification").fadeOut('slow');
    }, 15000);
});

$(document).ready(function() {
    //hide the notification after 2seconds  
    setTimeout(function() {
        $("#feddback").fadeOut('slow');
    }, 5000);
});
</script>
<!--chat bot-->
<script defer async>
document.addEventListener('DOMContentLoaded', function() {
    // setting global variables
    window.botId = 2904

    // create div with id = sarufi-chatbox
    const div = document.createElement("div")
    div.id = "sarufi-chatbox"
    document.body.appendChild(div)

    // create and attach script tag
    const script = document.createElement("script")
    script.crossOrigin = true
    script.type = "module"
    script.src = "https://cdn.jsdelivr.net/gh/flexcodelabs/sarufi-chatbox/example/vanilla-js/script.js"
    document.head.appendChild(script)

    // create and attach css
    const style = document.createElement("link")
    style.crossOrigin = true
    style.rel = "stylesheet"
    style.href = "https://cdn.jsdelivr.net/gh/flexcodelabs/sarufi-chatbox/example/vanilla-js/style.css"
    document.head.appendChild(style)
});
</script>
<!--chat bot-->
<script>
$(document).ready(function() {
    //hide the notification after 2seconds  
    setTimeout(function() {
        $("#notification").fadeOut('slow');
    }, 15000);
});

$(document).ready(function() {
    //hide the notification after 2seconds  
    setTimeout(function() {
        $("#feddback").fadeOut('slow');
    }, 5000);
});
</script>
</body>

</html>