@include('admin.includes.header')
  
@include('admin.includes.sidebar') 

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> User <small>Entry Form</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">User</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row"> 
      <!-- left column -->
      <div class="col-md-12"> 
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Create</h3>
            <a href="{{route('list.user')}}" class="btn btn-primary a-btn-slide-text" style="float:right"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <span><strong>Back</strong></span> </a>
            @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if (session()->has('message'))
                  <div class="alert alert-info alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      {{ session('message') }}
                  </div>
              @endif
              @if (session()->has('error_message'))
                  <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      {{ session('error_message') }}
                  </div>
              @endif
          </div>
          <!-- /.box-header --> 
          <!-- form start -->
          <form name="entry-form" method="post" action="{{route('create.user')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body"> 
              <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" name="role_id">
                  <option selected disabled>Select Role</option>
                  <option value="1">Admin</option>
                  <option value="2">Users</option>
                </select>
              </div>             
              <div class="form-group">
                <label for="category_name">Name<a class='lnkred'>*</a></label>
                <input type="text" class="form-control" name="name" placeholder="Name">
              </div> 
              <div class="form-group">
                <label for="email">Email<a class='lnkred'>*</a></label>
                <input type="email" class="form-control" name="email" placeholder="Email">
              </div> 
              <div class="form-group">
                <label for="mobile_no">Phone<a class='lnkred'>*</a></label>
                <input type="text" class="form-control" name="mobile_no" placeholder="mobile no">
              </div>
              <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" name="age" placeholder="Age">
              </div>
              <div class="form-group">
                <label for="school">School</label>
                <input type="text" class="form-control" name="school" placeholder="School">
              </div>
              <div class="form-group">
                <label for="occupation">Occupation</label>
                <input type="text" class="form-control" name="occupation" placeholder="Occupation">
              </div>
              <div class="form-group">
                <label for="company">Company</label>
                <input type="text" class="form-control" name="company" placeholder="Company">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
              </div>
              <div class="form-group">
                <label for="avatar">Profile pic</label>
                <input type="file" name="avatar" id="avatar">
              </div>
            </div>
            <!-- /.box-body -->
            
            <div class="box-footer">
              <input type="submit" class="btn btn-primary" value="Submit">
            </div>
          </form>
        </div>
        <!-- /.box --> 
        
      </div>
      <!--/.col (left) --> 
    </div>
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>


@include('admin.includes.footer')