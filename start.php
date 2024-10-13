<?php
$host = 'localhost';
$db = 'base';
$user = 'root';
$pass = '';
$message = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    $message = 'Ошибка подключения:';
    die("Ошибка подключения: " . $conn->connect_error);

}
$message = 'Подключение успешно';

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/main.css">

</head>

<body>
    <div class="c">

        <h1>Добро пожаловать!</h1>
        <?php
        echo "<p>Подключение успешно</p>";
        ?>

        <p>Выберите действие:</p>

        <div class="btn">
            <?php if ($conn->connect_error): ?>
                <span class="button disabled">Добавить термин</span>
                <span class="button disabled">Просмотр терминов</span>
            <?php else: ?>
                <br><a href="add_term.php" class="but">Добавить термин</a><br>
                <a href="table.php" class="but">Просмотр терминов</a>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>