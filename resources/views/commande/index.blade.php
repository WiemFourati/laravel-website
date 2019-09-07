@include('Admin.header')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">welcome {{Session::get('user')->name}}</h1>
         
<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">les commandes </h6>
                </div>
                
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>nomclient</th>
                      <th>email</th>
                      <th>numero</th>
                      <th>produit</th>
                      <th>quantité</th>
                      <th>message</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($commandes as $x)
                    <tr>
                      <td>{{$x -> nomclient}}</td>
                      <td>{{$x -> email}}</td>
                      <td>{{$x -> numero}} </td>
                      <td>{{$x -> idproduit}}  <strong>{{App\produit::findOrFail($x->idproduit)->nomproduit}}</strong></td>
                      <td>{{$x -> quantity}}</td>
                      <td>{{$x -> message}}</td>
                      <td><span><form action="{{ route('commande.destroy', $x->id)}}" method="post">
                                  @method('DELETE')
                                  @csrf
                                  <input class="btn btn-danger" type="submit"  onclick="return confirm('Are you sure to delete?')" value="Delete" />
                               </form>
                               <a href="mailto:{{$x->email}}" class="btn btn-xs btn-success">repondre</a> 
                           </span>
                    </td>
                      
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              
        </div>
        </div>
      <!-- End of Main Content -->

@include('Admin.footer')