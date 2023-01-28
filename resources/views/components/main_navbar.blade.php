<div class="main-navbar sticky-top bg-white">
    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
        <!-- Search form -->
        <div class="input-group">
                <div class="form-group has-search">
                    <i class="form-control-feedback material-icons" style="top:6px">search</i>
                    <input type="text" class="form-control" placeholder="Search" style="border-radius: 15px;">
                </div>
        </div>  
        <ul class="navbar-nav border-left flex-row ">
            <!-- li 01 -->
            <li class="nav-item border-right dropdown notifications">
            <a class="nav-link nav-link-icon text-center account_notif_btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                <div class="nav-link-icon__wrapper">
                <i class="zmdi zmdi-accounts-alt" style="color:#c3c7cc; font-size: 1.4925rem; margin-top: -3px;"></i>
                <span id="account_notif_badge" class="badge badge-pill badge-danger"></span>
                </div>
            </a>
            <!-- drop down menu-->
            <div class="dropdown-menu dropdown-menu-small li_cont2" aria-labelledby="dropdownMenuLink" style="min-width: 30rem">
                    {{-- Not empty ! --}}
            </div>
            </li>
            <!-- //////// -->
            <li class="nav-item border-right dropdown notifications">
            <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="nav-link-icon__wrapper">
                <i class="zmdi zmdi-email" style="color:#c3c7cc; font-size: 1.4925rem; margin-top: -3px;"></i>
                <span hidden class="badge badge-pill badge-danger"></span>
                </div>
            </a>
            <!-- drop down menu-->
            <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">
                <div class="notification__icon-wrapper">
                    <div class="notification__icon">
                    <i class="material-icons">&#xE6E1;</i>
                    </div>
                </div>
                <div class="notification__content">
                    <span class="notification__category">Analytics</span>
                    <p>Your website’s active users count increased by
                    <span class="text-success text-semibold">28%</span> in the last week. Great job!</p>
                </div>
                </a>
                <a class="dropdown-item" href="#">
                <div class="notification__icon-wrapper">
                    <div class="notification__icon">
                    <i class="material-icons">&#xE8D1;</i>
                    </div>
                </div>
                <div class="notification__content">
                    <span class="notification__category">Sales</span>
                    <p>Last week your store’s sales count decreased by
                    <span class="text-danger text-semibold">5.52%</span>. It could have been worse!</p>
                </div>
                </a>
                <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
            </div>
            </li>
            <!-- end li 01 -->

            <!-- li 02 -->
            <li class="nav-item border-right dropdown notifications principale_li">
            <a class="nav-link nav-link-icon text-center notif_btn" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="nav-link-icon__wrapper">
                <i class="zmdi zmdi-notifications zmdi-hc-5x " style="color:#c3c7cc; font-size: 24px;margin-top: -3px;"></i>
                <span id="notif_badge" class="badge badge-pill badge-danger"></span>
                </div>
            </a>
            
            <div class="dropdown-menu dropdown-menu-small li_cont" aria-labelledby="dropdownMenuLink" style="max-height: 567px; overflow:auto;">
                    {{-- Not empty --}}
            </div>
            </li>
            <!-- end li 02 -->

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-nowrap px-3" id="img_cont" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar rounded-circle mr-2" src="{{ asset($arr_data['all_fields_user']->avatar_path) }}" alt="User Avatar">
                <span class="d-none d-md-inline-block">{{ $arr_data['name'] }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-small" style="left:-49px">
                <a class="dropdown-item" href="user-profile-lite.html">
                <i class=""></i> Profile</a>
                <a class="dropdown-item" href="components-blog-posts.html">
                <i class=""></i> Blog Posts</a>
                <a class="dropdown-item" href="add-new-post.html">
                <i class=""></i> Add New Post</a>
                <div class="dropdown-divider"></div> 
                <a class="dropdown-item text-danger" href="{{ route('logout')}}">
                <i class="zmdi zmdi-power-setting text-danger"></i> Logout </a>
            </div>
            </li>
        </ul>
        <nav class="nav">
            <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
            <i class="material-icons">&#xE5D2;</i>
            </a>
        </nav>
    </nav>
</div>