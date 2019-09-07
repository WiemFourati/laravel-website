@include('Admin.header')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">les produits</h1>
          <p class="mb-4"> For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

            {{ Form::open(array('action' => 'produitController@store'))}}
            <label name="nomproduit">nom produit :</label>
            <input type="text" name="nomproduit" required>
            <label name="nomproduit">designation :</label>
            <input type="text" name="designation" required>
        
             <div class="col-sm-6">
   <select name="categorie" id="artist" class="form-control input-sm" required>
    <option value="">category :</option>
      @foreach($categories as $categ)
      <option value="{{$categ->namecategory}}">{{$categ->namecategory}}</option><!--khaterni khadma bil pluck -->
           
       @endforeach
    </select>
</div>
             {{Form::submit('add produit',['class' => 'btn btn-xs btn-primary'])}}
              {{ Form::close() }}
              
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div><h3>
            <?php 
            if(isset($flash_message))
              echo $flash_message;
            ?></h3>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>nomproduit</th>
                      <th>designation</th>
                      <th>categorie</th>
                      <th>images </th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($produits as $x)
                    <tr>
                      <td>{{$x -> id}}</td>
                      <td>{{$x -> nomproduit}}</td>
                      <td>{{$x -> designation}}</td>
                      <td>{{$x -> categorie}}</td>
                      <td><img  style="width: 10rem;" src="{{asset('images/'.DB::table('imageproduit')->where('idproduit','LIKE','%'.$x->idproduit.'%')->first()->url)}}"/></td>
                      <td><span><form action="{{ route('produit.destroy', $x->id)}}" method="post">
                                  @method('DELETE')
                                  @csrf
                                  <input class="btn btn-danger" type="submit"  onclick="return confirm('Are you sure to delete?')" value="Delete" />
                               </form>
                               <a href="{{ route('produit.edit', $x->id)}}" class="btn btn-xs btn-success">Modifier</a> 
                           </span>
                    </td>
                      
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@include('Admin.footer')