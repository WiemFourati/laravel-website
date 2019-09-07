@include('layouts.header')
<div class="container-fluid gtco-news" id="news">
    <div class="container">
    <h3>tous les produits</h3><br>
        
            @foreach($produits as $produit)
            <div class="d-flex">
            <div class="card" style="width: 18rem;">
            <img   class="card-img-top" style="width: 20rem;" src="{{asset('images/'.DB::table('imageproduit')->where('idproduit','LIKE','%'.$produit->id.'%')->first()->url)}}"/>

  <div class="card-body">
    <h5 class="card-title">{{$produit->nomproduit}}</h5>
    <p class="card-text">{{$produit->designation}}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$produit->id}}</li>
    <li class="list-group-item">{{$produit->categorie}}</li>
  </ul>
  <div class="card-body">
    <!--<a href="#" class="card-link">link</a>-->
    <a href="{{route('goproduit.edit',$produit->id)}}" class="btn btn-xs btn-danger">More Details</a>

    
  </div>
</div>

            </div>
            @endforeach
            
    </div>
</div>

@include('layouts.footer')