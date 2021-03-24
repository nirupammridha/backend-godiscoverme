@include('admin.includes.header')
  
@include('admin.includes.sidebar') 
 <!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> user <small>user List</small> </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">user</a></li>
      <li class="active">user List</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">user List</h3>
            <a href="{{route('add.user')}}" class="btn btn-primary a-btn-slide-text" style="float:right"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <span><strong>Add</strong></span> </a> 
            </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                   <th><b>ID</b></th>
                   <th><b>Image</b></th>
                   <th><b>User Name</b></th>
                   <th><b>Email ID</b></th>
                   <th><b>Phone</b></th>
                   <th><b>Contacts</b></th>
                   <th><b>Social links</b></th>
                  <th align="center">Action</th>
                </tr>
              </thead>
              <tbody>
               @if(!empty($user_list))
               @php $i=1; @endphp
                 @foreach($user_list as $user)                 
                  @if($i%2 == 0)
                  <tr bgcolor='#ffffff' class='even'>
                  @else
                  <tr bgcolor='#9CE2EF' class='odd'>
                  @endif
                   <td>{{ $i }}</td>
                   <td>
                    @if(!empty($user->avatar))
                    <img src="{{url('storage/avatars/'.$user->avatar)}}" height="50" width="50">
                    @endif
                   </td>
                   <td>{{$user->name}}</td>
                   <td>{{$user->email}}</td>
                   <td>{{$user->mobile_no}}</td>
                   <td><a href="{{route('user.contacts',$user->id)}}">View</a></td>
                   <td><a href="{{route('social.links',$user->id)}}">View</a></td>
                   <td>
                    <a href="{{route('edit.user',$user->id)}}">Edit</a> | 
                    <a href="{{url('admin/delete-user/'.$user->id)}}" onclick="return confirm_delete();">Delete</a>
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
