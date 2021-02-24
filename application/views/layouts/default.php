<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title; ?></title>
    <scritp src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"> </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/litera/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">Qcasts</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="/">Главная</a>
                <a class="p-2 text-dark" href="/users/form">Список пользователей</a>
            </nav>
            <a class="btn btn-outline-primary" href="/account/login">Авторизация</a>
            <a class="btn btn-outline-primary" href="/account/register">Регистрация</a>
        </div>
    </header>
    <?php echo $content; ?>
</body>

</html>