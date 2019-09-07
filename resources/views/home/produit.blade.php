@include('layouts.header')
<div class="container-fluid gtco-news" id="news">
    <div class="container">
    <div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
    <img   class="card-img-top" style="width: 20rem;" src="{{asset('images/'.DB::table('imageproduit')->where('idproduit','LIKE','%'.$produit->id.'%')->first()->url)}}"/>
    </div>
    <div class="col-md-8">
      <div class="card-body">
      
        <h5 class="card-title">{{$produit->nomproduit}}</h5>
        <p class="card-text">{{$produit->designation}}</p>
        <p class="card-text"><small class="text-muted">{{$produit->categorie}}</small></p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  BUY
</button>
      </div>
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">send command</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      {!! Form::model($produit,['route'=>['goproduit.update',$produit->id], 'method'=>'PATCH', 'files'=> true]) !!}
      <div class="form-group">
    <label for="file">product name :</label>
                    <p>{{$produit->nomproduit}}</p>
                </div>
              
                <div class="form-group">
    <label for="name">Full Name:</label>
                <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                </div>
                <div class="form-group">
    <label for="email">phone number :</label>
                <input type="number" class="form-control" placeholder="phone number" name="phone_number" required>
                   </div>
                <div class="form-group">
    <label for="email">Email address:</label>
                <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                   </div>
                   
                <div class="form-group">
    <label for="text">quantity :</label>
    <input type="number"  name="quantity" />
                </div>
                <div class="form-group">
    <label for="text">message :</label>
    <textarea class="form-control" placeholder="write any message" name="message" required></textarea>
                </div>
                <input class="btn btn-xs btn-primary" value="SEND"  type="submit" >
                {{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
</div>

@include('layouts.footer')