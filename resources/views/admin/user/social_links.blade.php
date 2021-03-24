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
            <h3 class="box-title">Social links</h3>
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
          <form name="entry-form" method="post" action="{{route('update.social.links')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{$user->user_id ?? $user_id}}">
            <div class="box-body">           
              <div class="form-group">
                <label for="facebook_link">Facebook link</label>
                <input type="text" class="form-control" name="facebook_link" value="{{$user->facebook_link ?? ''}}">
              </div> 
              <div class="form-group">
                <label for="twitter_link">Twitter link</label>
                <input type="text" class="form-control" name="twitter_link" value="{{$user->twitter_link ?? ''}}">
              </div> 
              <div class="form-group">
                <label for="instagram_link">Instagram link</label>
                <input type="text" class="form-control" name="instagram_link" value="{{$user->instagram_link ?? ''}}">
              </div>              
              <div class="form-group">
                <label for="linkedin_link">Linkedin link</label>
                <input type="text" class="form-control" name="linkedin_link" value="{{$user->linkedin_link ?? ''}}">
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