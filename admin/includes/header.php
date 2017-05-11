<div id="header" class="header navbar navbar-default navbar-fixed-top">
  <!-- begin container-fluid -->
  <div class="container-fluid">
    <!-- begin mobile sidebar expand / collapse button -->
    <div class="navbar-header">
      <a href="dashboard.php" class="navbar-brand"><img src="assets/img/gprbuslogo.png" class="fa fa-sm media-object"></a>
      <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
    </div>
    <!-- end mobile sidebar expand / collapse button -->
    <!-- begin header navigation right -->
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown navbar-user">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
        <span class="hidden-xs"><?php echo '<time datetime="'.date('c').'">'.date('Y - m - d').'&nbsp;&nbsp;&nbsp;</time>'; ?></span>
        <span class="hidden-xs"><?php echo $_SESSION['email']; ?></span> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu animated fadeInLeft">
          <li class="arrow"></li>
          <li class="divider"></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </li>
    </ul>
    <!-- end header navigation right -->
  </div>
  <!-- end container-fluid -->
</div>