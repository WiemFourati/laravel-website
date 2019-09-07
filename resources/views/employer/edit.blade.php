@include('Admin.header')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">update employers</h1>
          <p class="mb-4"> For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
            {!! Form::model($valeur,['method'=>'PATCH','route'=>['employer.update',$valeur->id],'files'=>true]) !!}
            @csrf
             {{ Form::text('nomemployer',$valeur->nomemployer,['required' => 'required'])}}
             {{ Form::text('email',$valeur->email,['required' => 'required'])}}
             <div class="col-sm-6">
   <select name="categorie" id="artist" class="form-control input-sm" required>
    <option value="{{$valeur->categorie}}">category :</option>
      @foreach($categories as $categ)
      <option value="{{$categ->namecategory}}">{{$categ->namecategory}}</option><!--khaterni khadma bil pluck -->
           
       @endforeach
    </select>
</div>
             <input type="file" name="image" required />
             {{ Form::text('message',$valeur->message,['required' => 'required'])}}
             {{Form::submit('update employer',['class' => 'btn btn-xs btn-primary'])}}
              {{ Form::close() }}

         
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@include('Admin.footer')