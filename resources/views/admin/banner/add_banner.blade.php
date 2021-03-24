@include('admin.includes.header')
  
@include('admin.includes.sidebar') 

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Banner <small>Entry Form</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Banner</li>
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
            <h3 class="box-title">Banner</h3>
            <a href="{{route('list.banner')}}" class="btn btn-primary a-btn-slide-text" style="float:right"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <span><strong>Back</strong></span> </a>
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
          <form name="entry-form" method="post" action="{{route('create.banner')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">                         
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title">
              </div>
              <div class="form-group">
                <label for="title">Section name</label>
                <input type="text" class="form-control" name="section_name">
              </div>
              <div class="form-group">
                  <label for="name">Banner Image</label>
                  <input type="file" class="form-control" name="banner_image">
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