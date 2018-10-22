<nav class="navbar navbar-expand navbar-dark bg-dark">
<div class="container">  
<a class="navbar-brand" href="<?php echo URLROOT; ?>/pages/index">Forum</a>
    <ul class="navbar-nav navbar-header-menu ml-auto">
    <li class="nav-item">
        <a class="nav-link active"><?php echo (isset($_SESSION['email']) ?  'Welcome, '.$_SESSION['name_user'] : ' ' ) ?> </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/profile"><?php echo (isset($_SESSION['email']) ?  'Profile' : '' ) ?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout"><?php echo (isset($_SESSION['email']) ?  'Logout' : 'Log in' ) ?> <span class="sr-only">(current)</span></a>
      </li>

    </ul>
  </div>
</nav>