@include('Admin.header')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">les clients</h1>

            {{ Form::open(array('action' => 'clientController@store','files'=>true))}}
            <label for="text">nom client :</label>
            <input type="text" name="nom" required>
            <label for="text">nom de la societe :</label>
            <input type="text" name="nomsociete" required>
            <label for="file">manager photo :</label>
             <input type="file" name="image1" required/>
            <label for="text">numero :</label>
            <input type="text" name="phone_number" required>
            <label for="text">email :</label>
            <input type="text" name="email" required>
            <label for="text">message :</label>
            <input type="text" name="message" required>
            <div class="col-sm-6">
   <select name="categorie" id="artist" class="form-control input-sm" required>
    <option value="">category :</option>
      @foreach($categories as $categ)
      <option value="{{$categ->namecategory}}">{{$categ->namecategory}}</option><!--khaterni khadma bil pluck -->
           
       @endforeach
    </select>
</div>
             <label for="file">logo :</label>
             <input type="file" name="image" required/>
             {{Form::submit('add client',['class' => 'btn btn-xs btn-primary'])}}
              {{ Form::close() }}
              
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
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
                      <th>nom client</th>
                      <th>photo client</th>
                      <th>nom societe</th>
                      <th>logo</th>
                      <th>categorie</th>
                      <th>email</th>
                      <th>numero</th>
                      <th>message</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($clients as $x)
                    <tr>
                      <td>{{$x -> id}}</td>
                      <td>{{$x -> nom}}</td>
                      <td><img style="width: 5rem;" src="{{asset('/images/'.$x -> image_manager)}}" /></td>
                      <td>{{$x -> nomsociete}}</td>
                      <td><img style="width: 5rem;" src="{{asset('/images/'.$x -> url_logo)}}" /></td>
                      <td>{{$x -> categorie}}</td>
                      <td>{{$x -> email}}</td>
                      <td>{{$x -> phone_number}}</td>
                      <td>{{$x -> message}}</td>
                      <td><span><form action="{{ route('client.destroy', $x->id)}}" method="post">
                                  @method('DELETE')
                                  @csrf
                                  <input class="btn btn-danger" type="submit"  onclick="return confirm('Are you sure to delete?')" value="Delete" />
                               </form>
                               <a href="{{ route('client.edit', $x->id)}}" class="btn btn-xs btn-success">Modifier</a> 
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