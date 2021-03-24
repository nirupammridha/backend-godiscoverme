@include('admin.includes.header')
  
@include('admin.includes.sidebar') 
 <!-- Content Wrapper. Contains page content -->  

  <div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Testimonial <small>Testimonial List</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Testimonial</a></li>
      <li class="active">Testimonial List</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Testimonial List</h3>
            <a href="{{route('testimonial')}}" class="btn btn-primary a-btn-slide-text" style="float:right"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <span><strong>Add</strong></span> </a> 
            </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                   <th>ID</th>
                  <th>Title</th>
                  <th>Designation</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th align="center">Action</th>
                </tr>
              </thead>
              <tbody>
                @if(!empty($testimonial_list))
                @php $i=1; @endphp
                @foreach($testimonial_list as $value)               
                  @if($i%2 == 0)
                  <tr bgcolor='#ffffff' class='even'>
                  @else
                  <tr bgcolor='#9CE2EF' class='odd'>
                  @endif
                   <td>{{ $i }}</td>
                   <td>{{$value->title}}</td>
                   <td>{{$value->designation}}</td>
                   <td>{!!$value->description!!}</td>
                  <td>
                    @if(!empty($value->image))
                    <img src="{{url('uploads/'.$value->image)}}" height="100" width="150">
                    @else
                    <p>No Image</p>
                    @endif
                  </td>
                   @if($value->status=='Active')
                  <td><span class="label label-success">Active</span></td>
                  @else
                  <td><span class="label label-danger">Inactive</span></td>
                  @endif
                   <td><a href="{{route('edit.testimonial',$value->id)}}">Edit</a></td>
                 </tr>
                 @php $i++; @endphp
                 @endforeach
               @endif
             
              </tbody>
              
            </table>
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
<!-- /.content-wrapper -->
@include('admin.includes.footer')
