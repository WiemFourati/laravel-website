@include('layouts.header')
<div class="container-fluid gtco-testimonials">
    <div class="container">
        <h2>What our customers say about us.</h2>
        <div class="owl-carousel owl-carousel1 owl-theme">
        @foreach($avis as $x)
            <div>
                <div class="card text-center"><img class="card-img-top" src="{{asset('images/'.$x->image_manager)}}" alt="photo">
                    <div class="card-body">
                        <h5>{{$x->nom}}<br/>
                            <span> {{$x->categorie}} of {{$x->nomsociete}}</span></h5>
                        <p class="card-text">“ {{$x->message}} ” </p>
                    </div>
                </div>
            </div>
            @endforeach
            
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