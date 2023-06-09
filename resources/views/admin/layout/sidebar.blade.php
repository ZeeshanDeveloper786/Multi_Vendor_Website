 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item">
             <a class="nav-link custom-nav" href="{{url('admin/dashboard')}}">
                 <i class="icon-grid menu-icon"></i>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>

         {{-- Vendor Side --}}
         @if (Auth::guard('admin')->user()->type == 'vendor')
         <li class="nav-item">
            <a class="nav-link custom-nav" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Vendor Details</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="flex-column sub-menu customStyle px-0">
                    <li class="nav-item"> <a class="nav-link custom-nav {{ (request()->is('admin/update-vendor-details/personal')) ? 'active' : '' }}" href="{{url('admin/update-vendor-details/personal')}}">Personal Details</a></li>
                    <li class="nav-item"> <a class="nav-link custom-nav {{ (request()->is('admin/update-vendor-details/business')) ? 'active' : '' }}" href="{{url('admin/update-vendor-details/business')}}">Business Details</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link custom-nav" href="{{url('admin/update-vendor-details/bank')}}">Bank Details</a>
                    </li>
                  
                </ul>
            </div>
        </li>
         @else 

         {{-- superadmin/admin/subadmin side --}}

         {{-- settings --}}
         <li class="nav-item">
             <a class="nav-link custom-nav" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                 <i class="icon-layout menu-icon"></i>
                 <span class="menu-title">Setting</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="ui-basic">
                 <ul class="flex-column sub-menu customStyle px-0">
                     <li class="nav-item {{ (request()->is('admin/update-admin-password')) ? 'active' : '' }}"> <a class="nav-link custom-nav" href="{{url('admin/update-admin-password')}}">Update Password</a></li>
                     <li class="nav-item {{ (request()->is('admin/update-admin-details')) ? 'active' : '' }}"> <a class="nav-link custom-nav" href="{{url('admin/update-admin-details')}}">Update Details</a>
                     </li>
                   
                 </ul>
             </div>
         </li>
             {{--Admin managment --}}
             <li class="nav-item">
                <a class="nav-link custom-nav" data-toggle="collapse" href="#adm_mgmt" aria-expanded="false" aria-controls="adm_mgmt">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Admin Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="adm_mgmt">
                    <ul class="flex-column sub-menu customStyle px-0">
                        
                        <li class="nav-item {{ (request()->is('admin/admins/Admin')) ? 'active' : '' }}"> <a class="nav-link custom-nav" href="{{url('admin/admins/Admin')}}">Admins</a></li>

                        <li class="nav-item {{ (request()->is('admin/admins/subadmin')) ? 'active' : '' }}"> <a class="nav-link custom-nav" href="{{url('admin/admins/subadmin')}}">Sub Admins</a>
                        </li>
                        
                        <li class="nav-item {{ (request()->is('admin/admins/vendor')) ? 'active' : '' }}"> <a class="nav-link custom-nav" href="{{url('admin/admins/vendor')}}">Vendors</a>
                        </li>
                        <li class="nav-item {{ (request()->is('admin/admins/all')) ? 'active' : '' }}"> <a class="nav-link custom-nav" href="{{url('admin/admins/all')}}">All</a>
                        </li>
                      
                    </ul>
                </div>
            </li>

            {{-- User managment --}}
            <li class="nav-item">
                <a class="nav-link custom-nav" data-toggle="collapse" href="#usermgmt" aria-expanded="false" aria-controls="usermgmt">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">User Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="usermgmt">
                    <ul class="flex-column sub-menu customStyle px-0">
                        <li class="nav-item {{ (request()->is('admin/users')) ? 'active' : '' }}"> <a class="nav-link custom-nav" href="{{url('admin/users')}}">Users</a></li>
                        <li class="nav-item"> <a class="nav-link custom-nav" href="{{url('admin/subscriber')}}">Subscriber</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- catalogue --}}
            <li class="nav-item">
                <a class="nav-link custom-nav" data-toggle="collapse" href="#catMgmt" aria-expanded="false" aria-controls="catMgmt">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Catalogue Managment</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="catMgmt">
                    <ul class="flex-column sub-menu customStyle px-0">
                        <li class="nav-item {{ (request()->is('admin/section')) ? 'active' : '' }}"> <a class="nav-link custom-nav" href="{{url('admin/section')}}">Section</a></li>
                        <li class="nav-item"> <a class="nav-link custom-nav {{ (request()->is('admin/categories')) ? 'active' : '' }}" href="{{url('admin/categories')}}">Categories</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link custom-nav {{ (request()->is('admin/brands')) ? 'active' : '' }}" href="{{url('admin/brands')}}">Brands</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link custom-nav {{ (request()->is('admin/Categories')) ? 'active' : '' }}" href="{{url('admin/Products')}}">Products</a>
                        </li>
                    </ul>
                </div>
            </li>
         @endif
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                 aria-controls="form-elements">
                 <i class="icon-columns menu-icon"></i>
                 <span class="menu-title">Form elements</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="form-elements">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"><a class="nav-link custom-nav" href="pages/forms/basic_elements.html">Basic Elements</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link custom-nav" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                 <i class="icon-bar-graph menu-icon"></i>
                 <span class="menu-title">Charts</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="charts">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link custom-nav" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                 <i class="icon-grid-2 menu-icon"></i>
                 <span class="menu-title">Tables</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="tables">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link custom-nav" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                 <i class="icon-contract menu-icon"></i>
                 <span class="menu-title">Icons</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="icons">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link custom-nav" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                 <i class="icon-head menu-icon"></i>
                 <span class="menu-title">User Pages</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="auth">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link custom-nav" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                 <i class="icon-ban menu-icon"></i>
                 <span class="menu-title">Error pages</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="error">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item"> <a class="nav-link custom-nav" href="pages/samples/error-404.html"> 404 </a></li>
                     <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link custom-nav" href="pages/documentation/documentation.html">
                 <i class="icon-paper menu-icon"></i>
                 <span class="menu-title">Documentation</span>
             </a>
         </li>
     </ul>
 </nav>
