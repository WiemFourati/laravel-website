@include('Admin.header')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">les employers</h1>
          <p class="mb-4"> For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

            {{ Form::open(array('action' => 'employerController@store','files'=>true))}}
            <label for="text">full name:</label>
             {{ Form::text('nomemployer',null,['required' => 'required'])}}
             <label for="email">Email address:</label>
             {{ Form::text('email',null,['required' => 'required'])}}
             <div class="col-sm-6">
   <select name="categorie" id="artist" class="form-control input-sm" required>
    <option value="">category :</option>
      @foreach($categories as $categ)
      <option value="{{$categ->namecategory}}">{{$categ->namecategory}}</option><!--khaterni khadma bil pluck -->
           
       @endforeach
    </select>
</div>
             <label for="file">photo:</label>
             <input type="file" name="image" required/>
             <label for="text">message:</label>
             {{ Form::text('message',null,['required' => 'required'])}}
             {{Form::submit('add employer',['class' => 'btn btn-xs btn-primary'])}}
              {{ Form::close() }}
              {{ Form::open(array('action' => 'employerController@getSearch'))}}
             {{ Form::text('nomemployer',null,['placeholder'=>'entrer le nom','required' => 'required'])}} <!--must be the same in table-->
             {{Form::submit('search employer',['class' => 'btn btn-xs btn-warning'])}}
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
                      <th>nom employer</th>
                      <th>email</th>
                      <th>categorie</th>
                      <th>photo</th>
                      <th>message</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($valeurs as $x)
                    <tr>
                      <td>{{$x -> nomemployer}}</td>
                      <td>{{$x -> email}}</td>
                      <td>{{$x -> categorie}}</td>
                      <td><img style="width: 10rem;" src="{{asset('images/'.$x -> url_photo)}}" /></td>
                      <td>{{$x -> message}}</td>
                      <td><span><form action="{{ route('employer.destroy', $x->id)}}" method="post">
                                  @method('DELETE')
                                  @csrf
                                  <input class="btn btn-danger" type="submit"  onclick="return confirm('Are you sure to delete?')" value="Delete" />
                               </form>
                               <a href="{{ route('employer.edit', $x->id)}}" class="btn btn-xs btn-success">Modifier</a> 
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