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
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <ul class="nav side-menu">
              <?php if ($_SESSION['role'] == 'admin') { ?>
                <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                <li><a href="/category"><i class="fa fa-list"></i> Categories</a></li>
                <li><a href="/tags"><i class="fa fa-desktop"></i> Tags</a></li>
              <?php } else { ?>
                <li><a href="/wiki"><i class="fa fa-list"></i> Wikis</a></li>
              <?php } ?>

            </ul>
          </div>

        </div>

       