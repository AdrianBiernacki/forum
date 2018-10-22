<?php require_once APPROOT.'/views/inc/header.php'?>
<?php require_once APPROOT.'/views/inc/navbar.php'?>
<div class="container mt-5">
  <div class="row">

    <div class=" offset-3 col-6">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="form-group">
          <label for="email">Email address</label>
          <span class="float-right text-danger"><?php echo $data['email_err'] ?></span>
          <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="first_name">First name</label>
          <span class="float-right text-danger"><?php echo $data['first_name_err'] ?></span>
          <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name">
        </div>
        <div class="form-group">
          <span class="float-right text-danger"><?php echo $data['password_err'] ?></span>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
        <span class="float-right text-danger"><?php echo $data['con_password_err'] ?></span>
          <label for="con_password">Confirm password</label>
          <input type="password" id="con_password" name="con_password" class="form-control" placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?php echo URLROOT; ?>/users/login" class='float-right'>Already have account? Log in </a>
      </form>
      
    </div>
  </div>
</div>
<?php require_once APPROOT.'/views/inc/footer.php'?>
