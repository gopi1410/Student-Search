<h1><a href='<?= $logout_url ?>'>Logout</a></h1>

<?php foreach ($api_info['data'] as $user) { ?>
    <?php foreach ($user as $item) {?>

        <?= $item ?><br />

<?php } } ?>
