@include('Admin.header')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">les slides</h1>

            {{ Form::open(array('action' => 'sliderController@store','files'=>true))}}
             {{ Form::text('title',null,['placeholder'=>'title','required' => 'required'])}}
             {{ Form::text('text',null,['placeholder'=>'text','required' => 'required'])}}
             {{ Form::text('url_button',null,['placeholder'=>'url button','required' => 'required'])}}
              <input type="file" name="image" required/>
              <div class="col-sm-6">
   <select name="categorie" id="artist" class="form-control input-sm" required>
    <option value="">category :</option>
      @foreach($categories as $categ)
      <option value="{{$categ->namecategory}}">{{$categ->namecategory}}</option><!--khaterni khadma bil pluck -->
           
       @endforeach
    </select>
</div>
          
             {{Form::submit('add slider',['class' => 'btn btn-xs btn-primary'])}}
              {{ Form::close() }}
              {{ Form::open(array('action' => 'sliderController@getSearch'))}}
             {{ Form::text('title',null,['placeholder'=>'entrer le titre'])}}
             {{ Form::text('text',null,['placeholder'=>'entrer le texte'])}} <!--must be the same in table-->
             {{Form::submit('search slider',['class' => 'btn btn-xs btn-warning'])}}
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
                    
                      <th>title</th>
                      <th>text</th>
                      <th>url button</th>
                      <th>image</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($values as $x)
                    <tr>
                     
                      <td>{{$x -> title}}</td>
                      <td>{{$x -> text}}</td>
                      <td>{{$x -> url_button}}</td>
                      <td><img style="width: 10rem;" src="{{asset('images/'.$x -> url_image)}}" /></td>
                      <td><span><form action="{{ route('slider.destroy', $x->id)}}" method="post">
                                  @method('DELETE')
                                  @csrf
                                  <input class="btn btn-danger" type="submit"  onclick="return confirm('Are you sure to delete?')" value="Delete" />
                               </form>
                               <a href="{{ route('slider.edit', $x->id)}}" class="btn btn-xs btn-success">Modifier</a> 
                           </span>
                    </td>
                      
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">les parametres</h1>
          @if(isset($val))
          {!! Form::model($val,['method'=>'PATCH','route'=>['parametre.update',$val->id]]) !!}
             {{ Form::text('email',$val->email,['placeholder'=>'email','required' => 'required'])}}
             {{ Form::text('localisation',$val->localisation,['placeholder'=>'localisation','required' => 'required'])}}
             {{ Form::text('tel',$val->tel,['placeholder'=>'tel','required' => 'required'])}}
             {{ Form::text('fax',$val->fax,['placeholder'=>'fax','required' => 'required'])}}
             {{ Form::text('horaire',$val->horaire,['placeholder'=>'horaire','required' => 'required'])}}
             {{Form::submit('edit parametre',['class' => 'btn btn-xs btn-primary'])}}
              {{ Form::close() }}
              @else
              {{ Form::open(array('action' => 'parametreController@store'))}}
             {{ Form::text('email',null,['placeholder'=>'email','required' => 'required'])}}
             {{ Form::text('localisation',null,['placeholder'=>'localisation','required' => 'required'])}} 
             {{ Form::text('tel',null,['placeholder'=>'telephone','required' => 'required'])}} 
             {{ Form::text('fax',null,['placeholder'=>'fax','required' => 'required'])}} 
             {{ Form::text('horaire',null,['placeholder'=>'horaire','required' => 'required'])}} <!--must be the same in table-->
             {{Form::submit('create parametre',['class' => 'btn btn-xs btn-warning'])}}
              {{ Form::close() }}
              @endif

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@include('Admin.footer')