@include('Admin.header')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">edit Page</h1>
          <h1 class="h3 mb-2 text-gray-800">update sliders</h1>
          <p class="mb-4"> For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
            {!! Form::model($value,['method'=>'PATCH','route'=>['slider.update',$value->id],'files'=>true]) !!}
            @csrf
             {{ Form::text('title',$value->title,['required' => 'required'])}}
             {{ Form::text('text',$value->text,['required' => 'required'])}}
             {{ Form::text('url_button',$value->url_button,['required' => 'required'])}}
             <input type="file" name="image" required/>
             <div class="col-sm-6">
   <select name="categorie" id="artist" class="form-control input-sm" required>
    <option value="">category :</option>
      @foreach($categories as $categ)
      <option value="{{$categ->namecategory}}">{{$categ->namecategory}}</option><!--khaterni khadma bil pluck -->
           
       @endforeach
    </select>
</div>
             {{Form::submit('update slider',['class' => 'btn btn-xs btn-primary'])}}
              {{ Form::close() }}
         

        </div>
        <!-- /.container-fluid -->

@include('Admin.footer')