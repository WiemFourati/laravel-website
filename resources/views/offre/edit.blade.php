@include('Admin.header')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">update offres</h1>

            {!! Form::model($offre,['method'=>'PATCH','route'=>['offre.update',$offre->id]]) !!}
             {{ Form::text('nomoffre',$offre->nomoffre)}}
             {{ Form::text('description',$offre->description)}}
             <div class="col-sm-6">
   <select name="categorie" id="artist" class="form-control input-sm" required>
    <option value="{{$offre->categorie}}">category :</option>
      @foreach($categories as $categ)
      <option value="{{$categ->namecategory}}">{{$categ->namecategory}}</option><!--khaterni khadma bil pluck -->
           
       @endforeach
    </select>
</div>
             {{Form::submit('update offre',['class' => 'btn btn-xs btn-primary'])}}
              {{ Form::close() }}
         
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@include('Admin.footer')