@include('Admin.header')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">les categories</h1>

            {{ Form::open(array('action' => 'categoryController@store'))}}
            <label for="namecategory">category name:</label>
            <input type="text" name="namecategory" required>
            <div class="col-sm-6">
   <select name="type" id="artist" class="form-control input-sm" required>
    <option value=""></option>
     
      <option value="produit">produit</option>
      <option value="client">client</option>
      <option value="offre">offre</option>
      <option value="employer">employer</option>
      <option value="produit">slider</option>
      
     
    </select>
</div>
             {{Form::submit('add category',['class' => 'btn btn-xs btn-primary'])}}
              {{ Form::close() }}
              {{ Form::open(array('action' => 'categoryController@getSearch'))}}
             {{ Form::text('namecategory',null,['required' => 'required','placeholder'=>'category name'])}} <!--must be the same in table-->
            
             {{Form::submit('search category',['class' => 'btn btn-xs btn-warning'])}}
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
                      <th>category name</th>
                      <th>type </th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($categories as $x)
                    <tr>
                      <td>{{$x -> id}}</td>
                      <td>{{$x -> namecategory}}</td>
                      <td>{{$x -> type}}</td>
                      <td><span><form action="{{ route('category.destroy', $x->id)}}" method="post">
                                  @method('DELETE')
                                  @csrf
                                  <input class="btn btn-danger" type="submit"  onclick="return confirm('Are you sure to delete?')" value="Delete" />
                               </form>
                               <a href="{{ route('category.edit', $x->id)}}" class="btn btn-xs btn-success">Modifier</a> 
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