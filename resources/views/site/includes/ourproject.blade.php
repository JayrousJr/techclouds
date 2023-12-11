 <div class="row pb-0 border-top pt-5 block__19738 section-counter">

   <div class="col-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
     <div class="d-flex align-items-center justify-content-center mb-2">
       <span class="icon-line-mobile mr-3"></span>

       <strong class="number" data-number='{{DB::table('projects')->count()}}'>0</strong>


     </div>
     <span class="caption">Completed Projects</span>
   </div>

   <div class="col-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
     <div class="d-flex align-items-center justify-content-center mb-2">
       <span class="icon-line-lightbulb mr-3"></span>
       <strong class="number" data-number="{{DB::table('services')->count()}}">0</strong>
     </div>
     <span class="caption">Our &amp; Services</span>
   </div>

   <div class="col-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
     <div class="d-flex align-items-center justify-content-center mb-2">
       <span class="icon-line-trophy mr-3"></span>
       <strong class="number" data-number="1">0</strong>
     </div>
     <span class="caption">Number of Team</span>
   </div>
 </div>