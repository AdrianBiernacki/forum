<?php require_once APPROOT . '/views/inc/header.php' ?>
<?php require_once APPROOT . '/views/inc/navbar.php' ?>

<div class="container">
    <?php foreach ($data as $post): ?>
        <div class="row pt-5">
            <div class="col-12"
                <?php if (isset($_POST['edit']) && $_POST['edit'] == $post->id): ?>
                    <form method="POST" action="<?php echo URLROOT ?>/posts/postedit/<?= $post->id . "/" . explode("/", $_GET['url'])[2]; ?>">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="<?= $post->title ?>">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content" name="content" class="form-control" rows=5 placeholder="<?= $post->body ?>"></textarea>
                            <button type="submit" name="save" value="<?= $post->title ?>" class="btn btn-success w-50 float-left">Save</button> 
                    </form>
                <?php else: ?>
                    <ul class="list-group">
                        <li class="list-group-item"><?= $post->title ?></li>
                        <li class="list-group-item"><?= $post->body ?> </li>
                        <li class="list-group-item text-right">Created at <?= date("m/d/Y", strtotime($post->created_at)) ?> By <?= $post->name_user ?></li>
                    </ul>
                <?php endif; ?>
                <?php if (isset($_POST['edit']) && ($_POST['edit']) == $post->id): ?>
                    <form method="post">
                        <button type="submit" name="return" value="<?= $post->id ?>" class="btn btn-danger w-50">Return</button> 
                    </form>
                <?php endif; ?>

                <?php if ($_SESSION['id'] == $post->user_id && !isset($_POST['edit'])) : ?>
                    <form method="post" class="d-inline-block pt-3">
                        <button type="submit" name="edit" value="<?= $post->id ?>" class="btn btn-success">Edit</button> 
                    </form>

                    <form method="post" class="d-inline-block pt-3" action="<?= URLROOT ?>/posts/postdelete/<?= $post->id . "/" . explode("/", $_GET['url'])[2]; ?>">
                        <button type="submit" name="remove" value="<?= $post->id ?>" class="btn btn-danger remove_post">Remove</button> 
                    </form>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="row">
        <div class="col-12">
            <?php if (!isset($_POST['create'])): ?>
                <form method="post">
                    <button type="submit" name="create" value="create" class="btn btn-success float-right mt-3">Add Post</button>
                </form> 
            <?php endif; ?>
        </div>
    </div>
    <?php if (isset($_POST['create'])): ?>
        <div class="row pt-5">
            <div class="col-12">
                <form method="POST" action="<?php echo URLROOT ?>/posts/addpost/<?php echo explode("/", $_GET['url'])[2]; ?>">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" name="content" class="form-control" rows=5 placeholder="Content"></textarea>
                        <button type="submit" name="add" value="add" class="btn btn-success mt-3 float-right">Add</button>
                </form>
                <form method="POST">
                    <button type="submit" name="remove" value="remove" class="btn btn-danger mt-3 float-right mr-3">Remove</button>
                </form>    
            </div>
        </div>
    </div>
<?php endif; ?>

</div>

<?php require_once APPROOT . '/views/inc/footer.php' ?>