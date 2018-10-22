<?php require_once 'inc/header.php'?>
<?php require_once 'inc/navbar.php'?>
<div class="container mt-5">
  <div class="row">

    <div class=" offset-3 col-6">
    <?php  flash('register_success'); ?>
    <?php  flash('change_password_success'); ?>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <span class="float-right text-danger"><?php echo $data['email_err'] ?></span>
          <input type="email" name="email" value="<?php echo $data['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <span class="float-right text-danger"><?php echo $data['password_err'] ?></span>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?php echo URLROOT; ?>/users/register" class='float-right'>No account? create it </a>
      </form>
      
    </div>
  </div>
</div>
<?php require_once 'inc/footer.php'?>
