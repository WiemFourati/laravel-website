@include('Admin.header')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">les categories</h1>
          <p class="mb-4"> For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
            {!! Form::model($categ,['method'=>'PATCH','route'=>['category.update',$categ->id]]) !!}
             {{ Form::text('namecategory',$categ->namecategory)}}
             
             {{Form::submit('update category',['class' => 'btn btn-xs btn-primary'])}}
              {{ Form::close() }}
         
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@include('Admin.footer')