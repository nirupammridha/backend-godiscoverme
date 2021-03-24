@include('admin.includes.header')
  
@include('admin.includes.sidebar')
    <!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Dashboard <small>Control panel</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    <!-- Small boxes (Stat box) -->
    <div class="row">      
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6"> 
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{$total_user}}</h3>
            <p>User Registrations</p>
          </div>
          <div class="icon"> <i class="ion ion-person-add"></i> </div>
          <a href="{{route('list.user')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
      </div>
      <!-- ./col --> 
    </div>
    <!-- /.row --> 
     
    
  </section>
  <!-- /.content --> 
</div>
<!-- /.content-wrapper -->
@include('admin.includes.footer')


