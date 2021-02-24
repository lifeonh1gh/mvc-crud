<div class="container">
  <div class="row justify-content-center">
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>Имя</th>
          <th>Пароль</th>
          <th>Эл. почта</th>
          <th>Редактировать</th>
        </tr>
      </thead>
      <?php foreach ($users as $user) { ?>
        <tr>
          <td><?= $user['name'] ?></td>
          <td><?= $user['password'] ?></td>
          <td><?= $user['email'] ?></td>
          <td>
            <a href="/users/<?= $user['id'] ?>/view" class="btn btn-success">Профиль</a>
            <a href="/users/<?= $user['id'] ?>/edit" class="btn btn-info">Изменить</a>
            <a href="/users/<?= $user['id'] ?>/delete" class="btn btn-danger">Удалить</a>
          </td>
        <?php } ?>
        </tr>
    </table>
    <a class="btn btn-info" name="save" href="/users/create">Добавить</a>
  </div>