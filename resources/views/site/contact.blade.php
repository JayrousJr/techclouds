@include('/site/includes/header')
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
<section class="home-section section-hero overlay slanted" id="home-section">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <h1>Contact Us</h1>
                <div class="mx-auto w-75">
                    <p>24/7 for helping our clients, be free to ask and give us your compliments</p>
                </div>
            </div>
        </div>
    </div>


    <!-- image ccontainer -->
    @include('/site/includes/imgcontainer3')
    <!-- image ccontainer -->

    <a href="#next-section" class="smoothscroll scroll-button"> <span class=" icon-keyboard_arrow_down"></span> </a>
</section>
<section class="site-section" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mb-5 mb-lg-0">
                <form action="/process/contact" class="form-contact contact_form" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-black" for="name">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                                    type="text" placeholder='Enter your name' readonly
                                    value="{{ Auth::check() ? Auth::user()->name : '' }}">
                                <input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::user()->id : '' }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-black" for="email">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                                    type="email" placeholder='Enter your email' readonly
                                    value="{{ Auth::check() ? Auth::user()->email : '' }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-black" for="subject">Subject</label>
                                <input class="form-control @error('subject') is-invalid @enderror" name="subject"
                                    id="subject" type="text" placeholder='Enter Subject'>
                                @error('subject')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100 @error('message') is-invalid @enderror"
                                    name="message" id="message" cols="30" rows="5"
                                    placeholder='Write your notes or questions here...'></textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <input type="submit" value="Send Message" class="btn btn-outline-primary btn-md">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 ml-auto contact">
                <div class="p-4 mb-3 bg-white">
                    <p class="mb-0 font-weight-bold">Address</p>
                    <ul>
                        <li><span class="icon-location_city"></span> {{config('company.address.street')}},
                            {{config('company.address.city')}}, {{config('company.address.country')}}
                        </li>
                    </ul>
                    <p class="mb-0 font-weight-bold">Phone</p>
                    <ul>
                        <li><a href="tel:{{config('company.phone')}}"><span class="icon-phone"></span>
                                {{config('company.phone')}}</a></li>
                    </ul>
                    <p class="mb-0 font-weight-bold">Email Address</p>
                    <ul>
                        <li><a href="mailto:{{config('company.email')}}"><span class="icon-envelope"></span>
                                {{config('company.email')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@include('/site/includes/footer')