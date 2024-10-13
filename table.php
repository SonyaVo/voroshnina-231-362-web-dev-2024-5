<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список терминов</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/table.css">
    
</head>
<body>
<duv class="c">
<h1>Список терминов и определений</h1>

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

// Получение данных из таблицы
$query = "SELECT term, definition FROM terms";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<table class="tb">';
    echo '<tr><th>Термин</th><th>Определение</th></tr>';
    
    // Вывод данных в таблицу
    while ($row = $result->fetch_assoc()) {
        $rem = $row['term'];
        $term_parts = explode(' ', $row['term']);
        $term_text = implode(' ', array_slice($term_parts, 0, -1)); // Термин без последнего слова
        $image_path = 'images/' . end($term_parts); // Последнее слово - это путь к изображению
        
        echo '<tr>';
        echo '<td>' . $term_text . '</td>';
        echo '<td>' . $row['definition'] . '</td>';
        // Вывод изображения с атрибутом title для показа термина при наведении
        echo '<td><div class="image-container" data-term="' . $term_text . '">';
        echo '<img src="' . $image_path . '" alt="' . $rem . '" class="term-image">';
        echo '</div></td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo '<p>Нет данных для отображения.</p>';
}

$conn->close();
?>

<a href="start.php" class="btn">Назад на главную</a>
</div>
</body>
</html>
