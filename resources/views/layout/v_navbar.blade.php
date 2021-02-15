<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{ request()->is('/home') ? 'active' : '' }}"><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li class="{{ request()->is('guru') ? 'active' : '' }}"><a href="/guru"><i class="fa fa-dashboard"></i> <span>Guru</span></a></li>
    <li class="{{ request()->is('siswa') ? 'active' : '' }}"><a href="/siswa"><i class="fa fa-dashboard"></i> <span>Siswa</span></a></li>

    <li class="{{ request()->is('user') ? 'active' : '' }}"><a href="/user"><i class="fa fa-book"></i> <span>user</span></a></li>

    <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
</ul>
