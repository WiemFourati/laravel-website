@include('Admin.header')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">update clients</h1>
          {!! Form::model($valeur,['route'=>['client.update',$valeur->id], 'method'=>'PATCH', 'files'=> true]) !!}
             {{ Form::text('nom',$valeur->nom)}}
             <div class="col-sm-6">
   <select name="categorie" id="artist" class="form-control input-sm" required>
    <option value="{{$valeur->categorie}}">category :</option>
      @foreach($categories as $categ)
      <option value="{{$categ->namecategory}}">{{$categ->namecategory}}</option>
           
       @endforeach
    </select>
</div>
             <input type="file" name="url_logo" />
             {{ Form::text('message',$valeur->message)}}
             {{Form::submit('update employer',['class' => 'btn btn-xs btn-primary'])}}
              {{ Form::close() }}
         
         
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
@include('Admin.footer')