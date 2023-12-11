@include('/site/includes/header')

<!-- HOME 

//Select the service table from the database so that to fetch all its related data and view them in the service_single.blade.php page //
-->

<section class="home-section section-hero overlay slanted" id="home-section">

    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                <h1>{{$service->service_name}}</h1>
                <div class="mx-auto w-75">
                    <p>{{$service->service_description}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- image ccontainer -->
    @include('/site/includes/imgcontainer5')
    <!-- image ccontainer -->


    <a href="#next-section" class="smoothscroll scroll-button">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>

</section>
<section class="site-section block__18514" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mr-auto">
                <div class="border p-4">
                    <ul class="list-unstyled block__47528 mb-0">
                        <li>
                            <span class="active" style="color: blue">
                                More Services
                            </span>
                        </li>
                        <li><span class="active">Marketing Strategy</span></li>
                        <li><span class="active">Web Design</span></li>
                        <li><span class="active">Market Leading</span></li>
                        <li><span class="active">Search Engine Optimization</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <span class="text-primary d-block mb-5">
                    <span class="icon-line-tools display-1"></span>
                </span>
                <h2 class="mb-4">{{$service->service_name}}</h2>
                <p>{{$service->service_more}}</p>
                @if (Route::has('login'))
                @auth
                <p><a href="#" aria-label="close" data-toggle="modal" data-target="#request"
                        class="btn btn-primary btn-md mt-4">Request Service</a></p>
                @else
                <p><a href="#" aria-label="close" data-toggle="modal" data-target="#account"
                        class="btn btn-primary btn-md mt-4">Request Service</a></p>
                @endif
                @endauth
            </div>



        </div>
    </div>
</section>

<div class="modal" id="account" role="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body bg-light">
                <p class="lead">Please Login or create an Account to make order</p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary float-left" href="{{ route('login') }}">Log in</a>
                <a class="btn btn-primary float-right" href="{{ url('/register') }}">Register</a>
            </div>
        </div>
    </div>
</div>

@if (Auth::user())
<div class="modal" id="request" role="modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4>Service Ordering Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body bg-light">
                <form class="" name="form" method="post" action="/makeorder-{{$service->id}}">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="Customer_Name" class="form-control" required
                                value="{{Auth::user()->name}}" readonly>
                            <input type="hidden" name="client_id" class="form-control" required
                                value="{{Auth::user()->id}}" readonly>
                        </div>

                        <div class="form-group">
                            <input type="text" name="Customer_Email" class="form-control"
                                value="{{Auth::user()->email}}" readonly>
                        </div>

                        <div class="form-group">
                            <input type="tel" name="Customer_Phone" value="{{Auth::user()->phone}}" readonly
                                class="form-control w-100 @error('Customer_Phone') is-invalid @enderror" required
                                placeholder=" Enter Phone Number">
                            @error('Customer_Phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="Service_Requested" class="form-control" required
                                placeholder="enter Details" value="{{$service->service_name}}" readonly>
                        </div>
                        <div class="form-group">
                            <textarea type="text" name="Short_Description"
                                class="form-control w-100 @error('Short_Description') is-invalid @enderror" required
                                placeholder="Describe your request shortly" rows="7"></textarea>
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Order Now</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endif

<hr>
@include ('/site/includes/happypeople')

@include ('/site/includes/footer')