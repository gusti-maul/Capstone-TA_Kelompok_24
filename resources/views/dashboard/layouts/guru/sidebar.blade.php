 <div class="sidebar sidebar-style-2">
     <div class="sidebar-wrapper scrollbar scrollbar-inner">
         <div class="sidebar-content">
             <div class="user">
                 <div class="avatar-sm float-left mr-2">
                     <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                 </div>
                 <div class="info">
                     <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                         <span>
                             {{auth()->user()->name}}
                             <span class="user-level"> {{auth()->user()->role}}</span>
                             <span class="caret"></span>
                         </span>
                     </a>
                     <div class="clearfix"></div>

                     <div class="collapse in" id="collapseExample">
                         <ul class="nav">
                             <li>
                                 <a href="#profile">
                                     <span class="link-collapse">My Profile</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="#edit">
                                     <span class="link-collapse">Edit Profile</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="#settings">
                                     <span class="link-collapse">Settings</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <ul class="nav nav-primary">
                 <li class="nav-item {{ Request::is('guru/dashboard*') ? 'active' : ''}}">
                     <a class=" nav-link" href=/guru/dashboard>
                         <i class="fas fa-home"></i>
                         <p>Dashboard</p>

                     </a>

                 </li>
                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Components</h4>
                 </li>
                 <li class="nav-item">
                     <a data-toggle="collapse" href="#base">
                         <i class="fas fa-layer-group"></i>
                         <p>Base</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="base">
                         <ul class="nav nav-collapse">
                             <li>
                                 <a href="components/avatars.html">
                                     <span class="sub-item">Avatars</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="components/buttons.html">
                                     <span class="sub-item">Buttons</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a data-toggle="collapse" href="#sidebarLayouts">
                         <i class="fas fa-th-list"></i>
                         <p>Sidebar Layouts</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="sidebarLayouts">
                         <ul class="nav nav-collapse">
                             <li>
                                 <a href="sidebar-style-1.html">
                                     <span class="sub-item">Sidebar Style 1</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="overlay-sidebar.html">
                                     <span class="sub-item">Overlay Sidebar</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a data-toggle="collapse" href="#forms">
                         <i class="fas fa-pen-square"></i>
                         <p>Forms</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="forms">
                         <ul class="nav nav-collapse">
                             <li>
                                 <a href="forms/forms.html">
                                     <span class="sub-item">Basic Form</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a data-toggle="collapse" href="#tables">
                         <i class="fas fa-table"></i>
                         <p>Tables</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="tables">
                         <ul class="nav nav-collapse">
                             <li>
                                 <a href="tables/tables.html">
                                     <span class="sub-item">Basic Table</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="tables/datatables.html">
                                     <span class="sub-item">Datatables</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a data-toggle="collapse" href="#maps">
                         <i class="fas fa-map-marker-alt"></i>
                         <p>User</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="maps">
                         <ul class="nav nav-collapse">
                             <li>
                                 <a href="/dashboard/user">
                                     <span class="sub-item">User</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="/register">
                                     <span class="sub-item">Register</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a data-toggle="collapse" href="#charts">
                         <i class="far fa-chart-bar"></i>
                         <p>Charts</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="charts">
                         <ul class="nav nav-collapse">
                             <li>
                                 <a href="charts/charts.html">
                                     <span class="sub-item">Chart Js</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="charts/sparkline.html">
                                     <span class="sub-item">Sparkline</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a data-toggle="collapse" href="#submenu">
                         <i class="fas fa-bars"></i>
                         <p>Menu Levels</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="submenu">
                         <ul class="nav nav-collapse">
                             <li>
                                 <a data-toggle="collapse" href="#subnav1">
                                     <span class="sub-item">Level 1</span>
                                     <span class="caret"></span>
                                 </a>
                                 <div class="collapse" id="subnav1">
                                     <ul class="nav nav-collapse subnav">
                                         <li>
                                             <a href="#">
                                                 <span class="sub-item">Level 2</span>
                                             </a>
                                         </li>
                                         <li>
                                             <a href="#">
                                                 <span class="sub-item">Level 2</span>
                                             </a>
                                         </li>
                                     </ul>
                                 </div>
                             </li>
                             <li>
                                 <a data-toggle="collapse" href="#subnav2">
                                     <span class="sub-item">Level 1</span>
                                     <span class="caret"></span>
                                 </a>
                                 <div class="collapse" id="subnav2">
                                     <ul class="nav nav-collapse subnav">
                                         <li>
                                             <a href="#">
                                                 <span class="sub-item">Level 2</span>
                                             </a>
                                         </li>
                                     </ul>
                                 </div>
                             </li>
                             <li>
                                 <a href="#">
                                     <span class="sub-item">Level 1</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
             </ul>
         </div>
     </div>
 </div>