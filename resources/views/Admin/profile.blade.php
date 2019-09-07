@include('Admin.header')
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">welcome {{Session::get('user')->name}}</h1>
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">votre profil </h6>
                </div>
                <div class="card-body">
                  <div class="text-left">
                  
                    <img style="width: 15rem;" src="{{asset('images/'.Session::get('user')->image_url)}}" alt="">
                    
                  </div>
                 
                  <form method="post" action="{{route('image.add')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="text" name="name"  value="{{Session::get('user')->name}}" /><br>
              <input type="email" name="email" value="{{Session::get('user')->email}}" /><br>
              <input type="password" name="password"value="{{Session::get('user')->password}}"/><br>
              <input type="file" name="image"/><br>
              <input type="submit" class="btn btn-success" value="update profile"/>
              </form>
            
                </div>
              </div>
              


    

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

@include('Admin.footer')