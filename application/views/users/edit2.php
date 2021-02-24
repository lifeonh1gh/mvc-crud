<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Редактировать<b><?php echo $user['name'] ?></b></h3>
        </div>
        <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="form-group">
                        <label>Имя</label>
                        <input name="name" class="form-control" 
                                value="<?php if(isset($_POST['name'])) echo $_POST['name']; else echo $user['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" class="form-control"
                            value="<?php if(isset($_POST['email'])) echo $_POST['email']; else echo $user['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Пароль</label>
                        <input name="password" class="form-control"
                            value="<?php if(isset($_POST['password'])) echo $_POST['password']; else echo $user['password'] ?>">
                    </div>
                    <input type="submit" name="submit" value="Save" class="btn btn-success">
                    <!-- <button class="btn btn-success">Сохранить</button> -->
                </form>
        </div>
    </div>
</div>