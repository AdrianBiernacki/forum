<?php require_once APPROOT.'/views/inc/header.php'?>
<?php require_once APPROOT.'/views/inc/navbar.php'?>
<div class="container">
    <div class="row">
        <div class="offset-3 col-6 text-center pt-5">

            <ul class="list-group">
                <li class="list-group-item"><?php echo $data->name_user;?></li>
                <li class="list-group-item"><?php echo $data->email;?></li>
                <a href="<?php echo URLROOT ?>/users/profileUpdate" class="mt-3">Zmień hasło</a>
            </ul>
        </div>
    </div>
</div>
<?php require_once APPROOT.'/views/inc/footer.php'?>
