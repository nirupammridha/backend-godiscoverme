@include('admin.includes.header')
  
@include('admin.includes.sidebar') 
 <!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Safety <small>Safety List</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Safety</a></li>
      <li class="active">Safety List</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Safety List</h3>
            <a href="{{route('add.safties')}}" class="btn btn-primary a-btn-slide-text" style="float:right"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <span><strong>Add</strong></span> </a> 
            </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                   <th><b>ID</b></th>
                   <th><b>Description</b></th>
                  <th align="center">Action</th>
                </tr>
              </thead>
              <tbody>
               @if(!empty($safties_list))
               @php $i=1; @endphp
                 @foreach($safties_list as $safties)                 
                  @if($i%2 == 0)
                  <tr bgcolor='#ffffff' class='even'>
                  @else
                  <tr bgcolor='#9CE2EF' class='odd'>
                  @endif
                   <td>{{ $i }}</td>  
                   <td>{{$safties->description}}</td>
                   <td>
                    <a href="{{route('edit.safties',$safties->id)}}">Edit/View</a>
                   </td>
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
