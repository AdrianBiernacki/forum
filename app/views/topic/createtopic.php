<?php require_once APPROOT . '/views/inc/header.php'?>
<?php require_once APPROOT . '/views/inc/navbar.php'?>
<div class="container pt-5">
    <div class="row">
        <div class="col-12">
        <form method="post" >
            <div class="form-group">
            <span class="float-right text-danger"><?php echo $this->data['topic_err'] ?></span>
                <input type="text" class="form-control" name="topic" id="topic" placeholder="Topic">
            </div>
            <button type="submit" class="btn btn-primary float-left">Create Topic</button>
        </form>
            <a href="<?= URLROOT ?>/topics/show" style="color: white;" class="btn btn-danger float-right">Back</a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'?>