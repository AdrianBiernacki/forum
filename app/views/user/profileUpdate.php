<?php require_once APPROOT . '/views/inc/header.php' ?>
<?php require_once APPROOT . '/views/inc/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class=" col-12 mx-auto pt-5 text-center">
            Zmiana hasła dla użytkownika
            <h3><?php echo $_SESSION['email'] ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3 pt-3">
            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                <div class="form-group">
                    <label for="password">Password</label>
                    <span class="float-right text-danger"><?php echo $this->data['password_err'] ?></span>
                    <input type="password" name="password" class="form-control" placeholder="Enter new password">
                </div>
                <div class="form-group">
                    <label for="con_password">Confirm password</label>
                    <span class="float-right text-danger"><?php echo $this->data['con_password_err'] ?></span>
                    <input type="con_password" name="con_password" class="form-control" placeholder="Confirm password">
                </div>
                <button type="submit" class="btn mx-auto d-block">Change password</button>
            </form>
        </div>
    </div>
</div>
</div>

<?php require_once APPROOT . '/views/inc/footer.php' ?>