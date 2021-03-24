@include('admin.includes.header')
  
@include('admin.includes.sidebar') 
 
  <div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Testimonial <small>Entry Form</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Testimonial</li>
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
            <h3 class="box-title">Add</h3>
            <p style="float:right">         
              <a href="{{route('list.testimonial')}}" class="btn btn-primary a-btn-slide-text">
               <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
               <span><strong>Back</strong></span>            
              </a>&nbsp;               
            </p>
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
          <form name="entry-form" method="post" action="{{route('testimonial_create')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group">
                <label for="title">Title<a class='lnkred'>*</a></label>
                <input type="text" class="form-control" name="title" placeholder="Title">
              </div>
              <div class="form-group">
                <label for="designation">Designation<a class='lnkred'>*</a></label>
                <input type="text" class="form-control" name="designation" placeholder="Designation">
              </div>
              <div class="form-group">
                <label for="description">Description<a class='lnkred'>*</a></label>
                <textarea id="description" name="description" class="ckeditor" rows="10" cols="80"></textarea>
              </div>
              <div class="form-group">
                  <label for="name">Image</label>
                  <input type="file" class="form-control" name="image">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Status<a class='lnkred'>*</a></label>
              </div>
              <div class="checkbox">
                  <input type="radio" name="status"  checked="checked" value="Active">
                  Active
                  <input type="radio" name="status" value="Inactive">
                  Inactive
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
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
        //$("#datepicker").datepicker();
        //Date picker
    /*$('#datepicker').datepicker({
      autoclose: true
    })*/
    $('#reservation').daterangepicker({format: 'DD/MM/YYYY'});
  </script>