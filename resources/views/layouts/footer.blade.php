
<footer class="container-fluid" id="gtco-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" id="contact">
                <h4> Contact Us </h4>
                <form method="post" action="{{url('/mailing')}}">
                {{csrf_field()}}
                <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                <input type="email" class="form-control" placeholder="Email Address" name ="email" required>
                <textarea class="form-control" placeholder="Message" name="message" required></textarea>
                <input type="submit" class="submit-button" value="SEND">
                </form>
                <!--<a href="#" class="submit-button">READ MORE <i class="fa fa-angle-right" aria-hidden="true"></i></a>-->
                
                <h5>
            <?php 
            if(isset($message))
              echo $message;
            ?></h5>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-6">
                        <h4>Company</h4>
                        <ul class="nav flex-column company-nav">
                            <li class="nav-item"><a class="nav-link" href="{{asset('/')}}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('/services')}}">Services</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('/about')}}">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('/news')}}">News</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('/contact')}}">Contact</a></li>
                        </ul>
                        <h4 class="mt-5">Find Us</h4>
                        
<ul class="nav flex-column company-nav">
                       <li class="nav-item"><i class="fa fa-map-marker" aria-hidden="true"></i>    LOCAL : @if(isset($info)){{$info->localisation}}@endif</li>
                       <li class="nav-item"><i class="fa fa-mobile" aria-hidden="true"></i>    TEL : @if(isset($info)){{$info->tel}}@endif</li>
                       <li class="nav-item"><i class="fa fa-inbox" aria-hidden="true"></i>     FAX : @if(isset($info)){{$info->fax}}@endif</li>
                       <li class="nav-item"><i class="fa fa-clock-o" aria-hidden="true"></i>     HORAIRE : @if(isset($info)){{$info->horaire}}@endif</li>
                       </ul>
                        <br>
                        <ul class="nav follow-us-nav">
                            <li class="nav-item"><a class="nav-link pl-0" href="#"><i class="fa fa-facebook"
                                                                                      aria-hidden="true"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-twitter"
                                                                                 aria-hidden="true"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-google"
                                                                                 aria-hidden="true"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-linkedin"
                                                                                 aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <h4>Services</h4>
                        <ul class="nav flex-column services-nav">
                            <li class="nav-item"><a class="nav-link" href="{{asset('/services')}}">Software</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('/services')}}">Hardware</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('/services')}}">Mobile App</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('/services')}}">Web Design</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{asset('/news')}}">innovation</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-12">
                        <p><a class="navbar-brand" href="{{asset('/')}}">
    <img src="{{asset('stylefrontoffice/images/index.png')}}" width="100" height="40" class="d-inline-block align-top" alt=""></a> &copy; 2019. All Rights Reserved. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('stylefrontoffice/js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{asset('stylefrontoffice/js/popper.min.js')}}"></script>
<script src="{{asset('stylefrontoffice/js/bootstrap.min.js')}}"></script>
<!-- owl carousel js-->
<script src="{{asset('stylefrontoffice/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('stylefrontoffice/js/main.js')}}"></script>
</body>
</html>

