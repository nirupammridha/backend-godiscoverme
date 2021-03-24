<aside class="main-sidebar"> 
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar"> 
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image"> 
        @if(!empty(Auth::user()->name))
          {{Auth::user()->name}}
         @else
          Admin
        @endif
      </div>
      <div class="pull-left info">
        <p></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a> </div>
    </div>
    <!-- search form -->
    
    <!-- /.search form --> 
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview {{ (Request::segment(1)=='admin' && in_array(Request::segment(2),['user']))?' active menu-open':'' }}"> <a href="#"> <i class="fa fa-users text-fuchsia"></i> <span>User Management</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="{{route('list.user')}}"><i class="fa fa-circle-o text-yellow"></i> All Users</a></li>
          <li><a href="{{route('add.user')}}"><i class="fa fa-circle-o text-aqua"></i> Add Users</a></li>
        </ul>
      </li>
      <li class="treeview {{ (Request::segment(1)=='admin' && in_array(Request::segment(2),['more']))?' active menu-open':'' }}"> <a href="#"> <i class="fa fa-files-o text-aqua"></i> <span>More</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        <ul class="treeview-menu">
          <li><a href="{{route('list.help')}}"><i class="fa fa-circle-o text-yellow"></i>Helps</a></li>
          <li><a href="{{route('list.terms')}}"><i class="fa fa-circle-o text-yellow"></i>Terms</a></li>
          <li><a href="{{route('list.safties')}}"><i class="fa fa-circle-o text-yellow"></i>Safety</a></li>
          <li><a href="{{route('list.level')}}"><i class="fa fa-circle-o text-yellow"></i>Level</a></li>
          <li><a href="{{route('list.banner')}}"><i class="fa fa-circle-o text-yellow"></i>Banner</a></li>
          <li><a href="{{route('list.testimonial')}}"><i class="fa fa-circle-o text-yellow"></i>Testimonial</a></li>
        </ul>
      </li>
      
    </ul>
  </section>
  <!-- /.sidebar --> 
</aside>
