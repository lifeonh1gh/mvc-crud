<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Редактировать</h3>
        </div>
        <div class="card-body">
            <?php if (isset($errorFind)) { ?>
                <h1><?= $errorFind ?></h1>
            <?php } else { ?>
                <?php if (isset($errors)) { ?>
                    <form method="POST" enctype="multipart/form-data" action="" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label>Имя</label>
                            <input name="name" class="form-control <?= $errors['name'] ? 'is-invalid' : '' ?>" value="<?php if (isset($_POST['name'])) echo $_POST['name'];
                                                                                                                        else echo $user['name'] ?>">
                            <div class="invalid-feedback">
                                <?= $errors['name'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" class="form-control  <?= $errors['email'] ? 'is-invalid' : '' ?>" value="<?php if (isset($_POST['email'])) echo $_POST['email'];
                                                                                                                            else echo $user['email'] ?>">
                            <div class="invalid-feedback">
                                <?= $errors['email'] ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Пароль</label>
                            <input name="password" class="form-control  <?= $errors['password'] ? 'is-invalid' : '' ?>" value="<?php if (isset($_POST['password'])) echo $_POST['password'];
                                                                                                                                else echo $user['password'] ?>">
                            <div class="invalid-feedback">
                                <?= $errors['password'] ?>
                            </div>
                        </div>
                        <input type="submit" name="submit" value="Save" class="btn btn-success">
                        <!-- <button class="btn btn-success">Сохранить</button> -->
                    </form>
                <?php } else { ?>
                    <form method="POST" enctype="multipart/form-data" action="" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label>Имя</label>
                            <input name="name" class="form-control" value="<?php if (isset($_POST['name'])) echo $_POST['name'];
                                                                            else echo $user['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" class="form-control" value="<?php if (isset($_POST['email'])) echo $_POST['email'];
                                                                            else echo $user['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Пароль</label>
                            <input name="password" class="form-control" value="<?php if (isset($_POST['password'])) echo $_POST['password'];
                                                                                else echo $user['password'] ?>">
                        </div>
                        <input type="submit" name="submit" value="Сохранить" class="btn btn-success">
                        <!-- <button class="btn btn-success">Сохранить</button> -->
                    </form>
                <?php } ?>
        </div>
    <?php } ?>
    </div>
</div>