<?php
// Подключение к базе данных
$host = 'localhost';
$db = 'base';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Переменные для хранения сообщений
$message = '';

// Обработка отправленной формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $term = $_POST['term'];
    $definition = $_POST['definition'];

    // Запрос на вставку данных в таблицу
    $query = "INSERT INTO terms (term, definition) VALUES ('$term', '$definition')";

    if ($conn->query($query) === TRUE) {
        $message = "Термин успешно добавлен!";
    } else {
        $message = "Ошибка: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить новый термин</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/add.css">
    
</head>

<body>
    <div class="c">

        <h1>Добавить новый термин</h1>

        <!-- Выводим сообщение -->
        <?php if (!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <form class="form-group" method="post" action="">
            <label class="form-label" for="term">Термин:</label><br>
            <input class="inp" type="text" id="term" name="term" required><br>

            <label class="form-label" for="definition">Определение:</label><br>
            <textarea class="inp" id="definition" name="definition" rows="4" required></textarea><br><br>

            <input class="btn" type="submit" value="Добавить">
            <a class="btn" href="start.php">Назад на главную</a>
        </form>

    </div>
</body>

</html>

<?php
// Закрываем соединение с базой данных
$conn->close();
?>