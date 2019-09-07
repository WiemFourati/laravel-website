
@include('layouts.header')
<div class="container-fluid " id="news">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 " id="contact">
                <h4> Apply for a carrier : </h4>
                <p>if you are a student , or a post graduate. you can apply now for a carrier : </p>
                {{ Form::open(array('action' => 'frontofficeController@store','files'=>true))}}
                <div class="form-group">
    <label for="name">Full Name:</label>
                <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                </div>
                <div class="form-group">
    <label for="email">Email address:</label>
                <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                   </div>
                   <div class="form-group">
    <label for="file">Curriculum Vitae:</label>
                    <input type="file" name="cv" value="your CV" required/>
                </div>
                <div class="form-group">
    <label for="text">Subject:</label>
                <textarea class="form-control" placeholder="subject" name="subject" required></textarea>
                </div>
                <input class="btn btn-xs btn-primary" value="SEND"  type="submit" >
                {{ Form::close() }}
            </div>
            <div class="col-md-4">
                <h2> join our team now ! </h2>
                <p style="color: white;"> <span>ExaDev</span> provides solutions for both web 
                and mobile applications
                 in all domaines: business , industry , marketing .. </p>
            </div>
        </div>
    </div>
</div>
<br>
<hr>
<br>
<div class="container-fluid gtco-feature" id="services">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="cover">
                    <div class="card">
                        <svg
                                class="back-bg"
                                width="100%" viewBox="0 0 900 700" style="position:absolute; z-index: -1">
                            <defs>
                                <linearGradient id="PSgrad_01" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                                    <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1"/>
                                    <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1"/>
                                </linearGradient>
                            </defs>
                            <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_01)"
                                  d="M616.656,2.494 L89.351,98.948 C19.867,111.658 -16.508,176.639 7.408,240.130 L122.755,546.348 C141.761,596.806 203.597,623.407 259.843,609.597 L697.535,502.126 C748.221,489.680 783.967,441.432 777.751,392.742 L739.837,95.775 C732.096,35.145 677.715,-8.675 616.656,2.494 Z"/>
                        </svg>
                        <!-- *************-->

                        <svg width="100%" viewBox="0 0 700 500">
                            <clipPath id="clip-path">
                                <path d="M89.479,0.180 L512.635,25.932 C568.395,29.326 603.115,76.927 590.357,129.078 L528.827,380.603 C518.688,422.048 472.661,448.814 427.190,443.300 L73.350,400.391 C32.374,395.422 -0.267,360.907 -0.002,322.064 L1.609,85.154 C1.938,36.786 40.481,-2.801 89.479,0.180 Z"></path>
                            </clipPath>
                            <!-- xlink:href for modern browsers, src for IE8- -->
                            <image clip-path="url(#clip-path)" xlink:href="{{asset('images/business.jpg')}}" width="100%"
                                   height="465" class="svg__image"></image>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h2> We are a Software Developper Agency & Hardware Marketing </h2>
                <p> <span>ExaDev</span> provides solutions for both web and mobile applications
                 in all domaines: business , industry , marketing .. </p>
                <p> Hardware Selling :
                    <small><span>ExaDev</span> offers you a variety of hardware products.
                    you can buy your machine components by filling a simple commande.

                    </small>
                </p>
                <a href="{{asset('/about')}}">Learn More <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
        </div>
    </div>
</div>
@include('layouts.footer')