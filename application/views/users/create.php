<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Добавить пользователя</h3>
        </div>
        <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="">
                    <div class="form-group">
                        <label>Ваше имя:</label>
                        <input type="text" name="name" class="form-control" placeholder="name">
                    </div>
                    <div class="form-group">
                        <label>Ваш email:</label>
                        <input type="text" name="email" class="form-control" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label>Ваш пароль:</label>
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>
                    <input type="submit" name="submit" value="Сохранить" class="btn btn-success">
                    <!-- <button class="btn btn-success">Сохранить</button> -->
                </form>
        </div>
    </div>
</div>