<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title">
        </div>
        <div class="clearfix"></div>

        <div class="profile clearfix">
          <div class="profile_pic">
            <center><img src="/img/Wikipedia-logo.png" alt="..." width="150" style="margin-top:1px;margin-left:30px;"></center>
          </div>
        </div>
        <br />
        <!-- sidebar menu -->
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
              <?php if ($_SESSION['role'] == 'admin') { ?>
                <li class="<?php echo ($page == 'dashboard') ? 'active' : ''; ?>">
                  <a href="/dashboard"><i class="fa fa-tachometer"></i> Dashboard</a>
                </li>
                <li class="<?php echo ($page == 'category') ? 'active' : ''; ?>">
                  <a href="/category"><i class="fa fa-folder"></i> Categories</a>
                </li>
                <li class="<?php echo ($page == 'tag') ? 'active' : ''; ?>">
                  <a href="/tags"><i class="fa fa-tags"></i> Tags</a>
                </li>
                <li class="<?php echo ($page == 'archive') ? 'active' : ''; ?>">
                  <a href="/archives"><i class="fa fa-list"></i> Wikis</a>
                </li>
              <?php } else { ?>
                <li class="<?php echo ($page == 'wiki') ? 'active' : ''; ?>">
                  <a href="/wiki"><i class="fa fa-list"></i> Wikis</a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>




        
        <style>
          .nav.side-menu li.active {
            border-right: 5px solid #1ABB9C;
          }

          .nav.side-menu li.active a,
          .nav.side-menu li.active i {
            color: #1ABB9C !important;
          }

          .nav-sm .nav.side-menu li.active a {
            text-align: center !important;
            font-weight: 400;
            font-size: 10px;
            padding: 10px 5px;
          }
        </style>