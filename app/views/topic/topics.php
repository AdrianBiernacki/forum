<?php require_once APPROOT.'/views/inc/header.php'?>
<?php require_once APPROOT.'/views/inc/navbar.php'?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">
            <h1>Topic</h1>
        </div>
    </div>
    <?php foreach ($data as $post) : ?>
        <div class="row">
            <div class="col-12 pt-5">
                <ul class="list-group">
                    <?php flash('is_not_logged') ?>
                    <a href="<?php echo URLROOT ?>/posts/show/<?php echo $post->topic_id ?>">
                    <li class="list-group-item bg-dark text-white p-4 font-weight-bold"><?= strtoupper($post->title) ?></li>
                    </a>
                    <li class="list-group-item text-right">Created at <?= date("m/d/Y", strtotime($post->created_at)) ?></li>
                </ul>
            </div>
            <div class="col-12">
                <?php if(isset($_SESSION['id']) && $post->user_id == $_SESSION['id']  ): ?>
                <form method="POST" action="<?php echo URLROOT?>/topics/deleteTopic" >
                    <button type="submit" name="<?= $post->topic_id ?>" class="btn btn-danger mt-1 float-right"> Delete </button>
                </form>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
        <?php if(isset($_SESSION['id'])): ?>
            <a href="<?php echo URLROOT ?>/topics/createtopic">
            <button type="button" name="create" class="btn btn-success mt-5 float-right"> Create new Topic </button>
            </a>
        <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once APPROOT.'/views/inc/footer.php'?>