<p>
    <?php if (isset($errorFind)) { ?>
        <h3><?=$errorFind?></h3>
    <?php } else { ?>
        <p>Удалить пользователя: <?=$user['name']?> ?</p>
        <form name="delete-user" action="" method="post">
            <input type="submit" name="submit" value="Да">
        </form>
    <?php } ?>
</p>