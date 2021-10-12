<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview" role="menu"
        data-accordion="false">

        <li class="nav-item">
            <a href="{{ url('/dash') }}" class="nav-link  {{ Request::routeIs('home.*') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt nav-icon"></i>
                <p>Dashboard</p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ route('post.index') }}"
                class="nav-link {{ Request::routeIs('post.*') ? 'active' : '' }}">
                <i class="fa fa-audio-description nav-icon"></i>
                <p>Post </p>
            </a>
        </li>

        
        <li class="nav-item">
            <a href="{{ route('postcomment.index') }}"
                class="nav-link {{ Request::routeIs('postcomment.*') ? 'active' : '' }}">
                <i class="fas fa-user nav-icon"></i>
                <p>Post Comments </p>
            </a>
        </li>
      
     
    

      



    </ul>
</nav>
<!-- /.sidebar-menu -->
