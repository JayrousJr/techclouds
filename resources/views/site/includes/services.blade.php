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

    				<a href='' class='block__16443 text-center d-block'>
    					<span class='custom-icon mx-auto'><span class='icon d-block'></span></span>
    					<h3>service_name</h3>
    					<p>service_discription</p>
    				</a>

    			</div>
    			@endforeach
    			@else
    			<div id="posts" class="row no-gutter">
    				<div class="item text-center error-title  col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4" data-aos="fade">
    					<i class="icon-trash-o"></i>
    					<p class="mb-3lead">No Service is available for now</p>
    				</div>
    			</div>
    			@endif
    		</div>
    	</div>
    </section>