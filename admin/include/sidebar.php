<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
    
    </section>
    <!-- /.sidebar -->
  </aside><aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $img; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $r['u_name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a href="dashboard">
            <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-tag "></i> <span>Coupon</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="add-coupon"><i class="fa fa-circle-o"></i> Add Coupon</a></li>
            <li><a href="view-coupon"><i class="fa fa-circle-o"></i> View Coupon</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i> <span>Store</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="add-store"><i class="fa fa-circle-o"></i> Add Store</a></li>
            <li><a href="view-store"><i class="fa fa-circle-o"></i> View Store</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="add-category"><i class="fa fa-circle-o"></i> Add Category</a></li>
            <li><a href="view-category"><i class="fa fa-circle-o"></i> View Category</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-copy"></i> <span>Sub Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="add-subcategory"><i class="fa fa-circle-o"></i> Add Sub Category</a></li>
            <li><a href="view-subcategory"><i class="fa fa-circle-o"></i> View Sub Category</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags"></i> <span>Tags</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="add-tag"><i class="fa fa-circle-o"></i> Add Tag</a></li>
            <li><a href="view-tags"><i class="fa fa-circle-o"></i> View Tag</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-blog"></i> <span>Blogs</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="add-blog"><i class="fa fa-circle-o"></i> Add Blog</a></li>
            <li><a href="view-blog"><i class="fa fa-circle-o"></i> View Blogs</a></li>
          </ul>
        </li>

        <li class="">
          <a href="subscriber">
            <i class="fas fa-envelope"></i> <span> Subscribers</span>
          </a>
        </li>

        <li class="">
          <a href="user">
            <i class="fas fa-users"></i> <span> Users</span>
          </a>
        </li>

        <li class="">
          <a href="settings">
            <i class="fa fa-cog"></i> <span>Settings</span>
          </a>
        </li>

        <li class="">
          <a href="account-settings">
            <i class="fa fa-cog"></i> <span>Account Settings</span>
          </a>
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>