@include('layouts.header')
<div class="container-fluid gtco-news" id="news">
    <div class="container">
    <h3>Promotions</h3><br>
        <div class="owl-carousel owl-carousel2 owl-theme">
            
            @foreach($sliders as $slider)
            <div>
                <div class="card text-center"><img class="card-img-top" src="{{asset('images/'.$slider->url_image)}}" alt="product image" height="500" width="500">
                    <div class="card-body text-left pr-0 pl-0">
                        <h5> {{$slider->title}} </h5>
                        <p class="card-text">{{$slider->text}} </p>
                        <a href="#">BUY <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
<div class=" container-fluid gtco-news" id="news">
    <div class="container">
        <h3>Solutions</h3><br>
        <div class="owl-carousel owl-carousel2 owl-theme">
            
            @foreach($sliders as $slider)
            <div>
                <div class="card text-center"><img class="card-img-top" src="{{asset('images/'.$slider->url_image)}}" alt="product image" height="500" width="500">
                    <div class="card-body text-left pr-0 pl-0">
                        <h5> {{$slider->title}} </h5>
                        <p class="card-text">{{$slider->text}} </p>
                        <a href="#">BUY <i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
@include('layouts.footer')