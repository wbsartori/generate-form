<?php

if(basename($_SERVER['PHP_SELF'], '.php') === basename(__FILE__, '.php')) {
    header('HTTP/1.0 404 Not found!');
    die();
}

require_once BASE_ROOT . '/vendor/autoload.php';

?>

<?php include_once('../_includes/include.header.php'); ?>

<div class="container">
    <h4 class="mt-5">TITLE</h4>
    <hr class="bg-dark">
    <div class="row mt-5">
        <div class="col-md-12">
            <form method="post" action="">
                <input type="hidden" class="form-control" maxlength="7" id="id" name="id" value="<?= $registers->id ?? ''; ?>">
                <?php include ('./_form.php'); ?>
                <hr class="bg-dark">
                <button class="btn btn-success" type="submit">Confirm Delete</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_includes/include.footer.php'); ?>
