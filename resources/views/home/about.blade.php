@include('layouts.header')
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
                            <image clip-path="url(#clip-path)" xlink:href="{{asset('stylefrontoffice/images/learn-img.jpg')}}" width="100%"
                                   height="465" class="svg__image"></image>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h2> We are a Software Developper Agency & Hardware Marketing </h2>
                <p class="text-light" style="margin: 20px;"> <span>ExaDev</span> provides solutions for both web and mobile applications
                 in all domaines: business , industry , marketing ..
                    We offer you a variety of hardware products.
                    you can buy components for your machine by filling a simple command.
                </p>
                <a href="#info" class="d-block text-center" style="margin:auto 120px ;">Learn More <i class="fa fa-angle-down" aria-hidden="true"></i></a></div>
        </div>
    </div>
</div>
<div id="info">
<div class="card text-center">

  <div class="card-body">
    <h5 class="card-title">LA SOCIÉTÉ</h5><br>
    <p class="card-text" style="margin:auto 100px ;">
EXADEV est une société spécialisée dans le développement logiciel.
Implantée à Sfax dans la Tunisie, elle développe ses 
activités
autour de différentes prestations de 
services informatiques dédiées aux entreprises. Toute l’équipe est à votre écoute pour vous 
conseiller et vous orienter au mieux vers des solutions logicie
lles adaptées à votre profession et à vos 
besoins.</p>
<br>
  <br>
  </div>
  <div class="card-footer text-muted">
  ExaDev-team
  </div>
</div>
<div class="card text-center">

  <div class="card-body">
    <h5 class="card-title">NOTRE MÉTIER</h5><br>
    <p class="card-text"style="margin:auto 100px ;">
    Au
-
delà de nos prestations informatiques, nous allons encore plus loin avec vous. Nos interventions 
se déroulent dans une logique de compréhension de votre métier et de prévention des risques.
Notre expérience nous permet de vous conseiller et de vous accompagner dans la concrétisation de 
vos projets, notamment grâce à l'intégration de nos spécialistes au sein de vos équipes afin d'avancer 
ensemble et d'atteindre des objectifs bien définis.</p>
<br>
  <br>
  </div>
  <div class="card-footer text-muted">
  ExaDev-team
  </div>
</div>
<div class="card text-center">

  <div class="card-body">
    <h5 class="card-title">NOTRE ÉQUIPE</h5><br>
    <p class="card-text"style="margin:auto 100px ;">
    Notre connaissance d'une grande 
variété
de langages de programmation et des techniques de 
développement Web nous conduisent à proposer nos compétences aux services informatiques 
d’entreprises. Notre équipe dispose de compétences professionnelles 
confirmées dans la gestion de 
projets informatiques. De la conception logicielle au développement web, en passant par la 
maintenance logicielle, EXADEV devient VOTRE partenaire informatique.</p>
<br>
  <br>
  </div>
  
  <div class="card-footer text-muted">
    ExaDev-team
  </div>
</div>
</div>
<div class="container-fluid gtco-testimonials">
    <div class="container">
        <h2>Our Team</h2>
        <div class="owl-carousel owl-carousel1 owl-theme">
            @foreach($employers as $employee)
            <div>
                <div class="card text-center"><img class="card-img-top" src="{{asset('images/'.$employee->url_photo)}}" alt="">
                    <div class="card-body">
                        <h5>{{$employee->nomemployer}} <br/>
                            <span> {{$employee->categorie}}</span></h5>
                        <p class="card-text">“ {{$employee->message}} ” </p>
                    </div>
                </div>
            </div>
            @endforeach
            
            <div>
                <div class="card text-center"><img class="card-img-top" src="{{asset('stylefrontoffice/images/wiemfourati.jpg')}}" alt="">
                    <div class="card-body">
                        <h5>wiem fourati<br/>
                            <span> developper and designer </span></h5>
                        <p class="card-text">“ nice experience to work in this company, good developping environnement ” </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<div class="container-fluid gtco-logo-area">
    <div class="container">
    <h2>Trusted By : </h2>
    <br>
    <br>
        <div class="row">
        @foreach($trustedby as $x)
            <div class="d-flex"><img src="{{asset('/images/'.$x->url_logo)}}" class="img-fluid" alt="logo" style="width: 5rem;"></div>
        
        @endforeach
        </div>
    </div>
</div>
@include('layouts.footer')