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
                <h1>Where Do You Learn HTML &amp; CSS in 2020?</h1>
                <div class="mx-auto w-75">
                    <p class="text-uppercase">Posted by <a href="#" target="_blank" class="text-uppercase">Admin</a>
                        <span class="d-inline-block mx-2">&bullet;</span> <a href="#" class="text-uppercase">08 Apr
                            2019</a> <span class="d-inline-block mx-2">&bullet;</span> <a href="#"
                            class="text-uppercase">6 Comments</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- VIDEO -->

    <a href="#next-section" class="smoothscroll scroll-button">
        <span class=" icon-keyboard_arrow_down"></span>
    </a>

</section>

<section class="site-section" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 blog-content">
                <h3 class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit</h3>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda nihil aspernatur
                    nemo sunt, qui, harum repudiandae quisquam eaque dolore itaque quod tenetur quo quos labore?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae expedita cumque necessitatibus ducimus
                    debitis totam, quasi praesentium eveniet tempore possimus illo esse, facilis? Corrupti possimus quae
                    ipsa pariatur cumque, accusantium tenetur voluptatibus incidunt reprehenderit, quidem repellat
                    sapiente, id, earum obcaecati.</p>

                <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident vero tempora aliquam
                        excepturi labore, ad soluta voluptate necessitatibus. Nulla error beatae, quam, facilis suscipit
                        quaerat aperiam minima eveniet quis placeat.</p>
                </blockquote>

                <p>Eveniet deleniti accusantium nulla natus nobis nam asperiores ipsa minima laudantium vero cumque
                    cupiditate ipsum ratione dicta, expedita quae, officiis provident harum nisi! Esse eligendi ab
                    molestias, quod nostrum hic saepe repudiandae non. Suscipit reiciendis tempora ut, saepe temporibus
                    nemo.</p>

                <h3>Event Images</h3>
                <div class='row'>
                    <div class='col-md-4 col-lg-4 item'>
                        <a href='images/proj_4.jpg' class='item-wrap fancybox bd-placeholder-img'
                            data-fancybox='gallery2'>
                            <span class='icon-search'></span>
                            <img class='img-fluid bd-placeholder-img' src='images/proj_4.jpg'>
                        </a>
                    </div>
                    <div class='col-md-4 col-lg-4 item'>
                        <a href='images/proj_1.jpg' class='item-wrap fancybox bd-placeholder-img'
                            data-fancybox='gallery2'>
                            <span class='icon-search'></span>
                            <img class='img-fluid bd-placeholder-img' src='images/proj_1.jpg'>
                        </a>
                    </div>
                    <div class='col-md-4 col-lg-4 item'>
                        <a href='images/proj_5.jpg' class='item-wrap fancybox bd-placeholder-img'
                            data-fancybox='gallery2'>
                            <span class='icon-search'></span>
                            <img class='img-fluid bd-placeholder-img' src='images/proj_5.jpg'>
                        </a>
                    </div>
                </div>
                <div class="pt-5">
                    <p>Categories: <a href="#">Design</a>, <a href="#">Events</a> Tags: <a href="#">#html</a>, <a
                            href="#">#trends</a></p>
                </div>


                <div class="pt-5">
                    <h3 class="mb-5">6 Comments</h3>
                    <ul class="comment-list">
                        <li class="comment">
                            <div class="vcard bio">
                                <img src="images/person_2.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Jacob Smith</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                    necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                    iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="btn btn-primary btn-md mt-4" aria-label="close"
                                        data-toggle="modal" data-target="#reply">Reply</a></p>
                            </div>
                        </li>

                        <li class="comment">
                            <div class="vcard bio">
                                <img src="images/person_2.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Chris Meyer</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                    necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                    iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="btn btn-primary btn-md mt-4" aria-label="close"
                                        data-toggle="modal" data-target="#reply">Reply</a></p>
                            </div>

                            <ul class="children">
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="images/person_5.jpg" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>Chintan Patel</h3>
                                        <div class="meta">January 9, 2018 at 2:21pm</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                            laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe
                                            enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?
                                        </p>
                                        <p><a href="#" class="btn btn-primary btn-md mt-4" aria-label="close"
                                                data-toggle="modal" data-target="#reply">Reply</a></p>
                                    </div>


                                    <ul class="children">
                                        <li class="comment">
                                            <div class="vcard bio">
                                                <img src="images/person_2.jpg" alt="Image placeholder">
                                            </div>
                                            <div class="comment-body">
                                                <h3>Jean Doe</h3>
                                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur
                                                    quidem laborum necessitatibus, ipsam impedit vitae autem, eum
                                                    officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum
                                                    impedit necessitatibus, nihil?</p>
                                                <p><a href="#" class="btn btn-primary btn-md mt-4" aria-label="close"
                                                        data-toggle="modal" data-target="#reply">Reply</a></p>
                                            </div>

                                            <ul class="children">
                                                <li class="comment">
                                                    <div class="vcard bio">
                                                        <img src="images/person_4.jpg" alt="Image placeholder">
                                                    </div>
                                                    <div class="comment-body">
                                                        <h3>Ben Afflick</h3>
                                                        <div class="meta">January 9, 2018 at 2:21pm</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Pariatur quidem laborum necessitatibus, ipsam impedit vitae
                                                            autem, eum officia, fugiat saepe enim sapiente iste iure!
                                                            Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                        <p><a href="#" class="btn btn-primary btn-md mt-4"
                                                                aria-label="close" data-toggle="modal"
                                                                data-target="#reply">Reply</a></p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="comment">
                            <div class="vcard bio">
                                <img src="images/person_2.jpg" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>Jean Doe</h3>
                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                    necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente
                                    iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                <p><a href="#" class="btn btn-primary btn-md mt-4" aria-label="close"
                                        data-toggle="modal" data-target="#reply">Reply</a></p>
                            </div>
                        </li>
                    </ul>
                    <!-- END comment-list -->

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        <form action="#" class="">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="url" class="form-control" id="website">
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary btn-md">
                            </div>

                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-4 sidebar pl-md-5">
                <div class="sidebar-box">
                    <img src="images/joyder.jpg" alt="Image placeholder" class="img-fluid mb-4 w-50 rounded-circle">
                    <h3>About The Author</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                        voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur
                        similique, inventore eos fugit cupiditate numquam!</p>
                </div>

                <div class="sidebar-box">
                    <div class="categories">
                        <h3>Categories</h3>
                        <li><a href="#">Creatives <span>(12)</span></a></li>
                        <li><a href="#">News <span>(22)</span></a></li>
                        <li><a href="#">Design <span>(37)</span></a></li>
                        <li><a href="#">HTML <span>(42)</span></a></li>
                        <li><a href="#">Web Development <span>(14)</span></a></li>
                    </div>
                </div>


                <div class="sidebar-box">
                    <h3>Paragraph</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem
                        necessitatibus
                        voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur
                        similique, inventore eos fugit cupiditate numquam!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal" id="reply" role="modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4>Reply Message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body bg-light">
                <form class="" name="form" method="post" action="">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea type="text" name="Short_Description"
                                class="form-control w-100 @error('Short_Description') is-invalid @enderror" required
                                placeholder="Type Your Reply here" rows="7"></textarea>
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-primary">Send Reply</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- SCRIPTS -->
@include('/site/includes/footer')