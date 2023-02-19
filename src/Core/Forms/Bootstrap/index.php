<?php

if(basename($_SERVER['PHP_SELF'], '.php') === basename(__FILE__, '.php')) {
    header('HTTP/1.0 404 Not found!');
    die();
}

require_once BASE_ROOT . '/vendor/autoload.php';

?>

<?php include_once('../_includes/include.header.php'); ?>

<h4 class="mt-5">TITLE</h4>
<hr class="bg-dark">
    <a href="novo.php" class="btn btn-primary">Novo</a>
    <hr class="bg-dark">
<div class="container-fluid">
    <div class="row mt-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Razao Social</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($registers as $item) { ?>
                <tr>
                    <td><?php echo $item['id'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once('../_includes/include.footer.php'); ?>