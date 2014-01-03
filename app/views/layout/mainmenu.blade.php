@section('listmenu')    
      <ul class="nav">
        @foreach($menus as $menu)
           <li class="{{$menu['active']}}"><a href="{{$menu['url']}}"><i class="{{$menu['icon']}}"></i> {{$menu['label']}}</a></li>
        @endforeach
      </ul> 

@stop


<div class="navbar">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#" name="top"><i class="icon-cogs"></i>MCPro Manager</a>
      <div class="nav-collapse collapse">
        
          @yield('listmenu')

      </div>

    </div>

  </div>

</div>


          <!-- <li class="divider-vertical"></li> -->
       

        <!-- <div class="btn-group pull-right">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
            <i class=""></i> admin <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-wrench"></i> Settings</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class=""></i> Logout</a></li>
          </ul>
        </div>        -->