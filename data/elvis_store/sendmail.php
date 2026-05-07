<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Информация о похищении</title>
</head>
<body>
    <h2>Elvis Store</h2>
    <?php
$host = 'localhost'; 
$db_name = 'elvis_store';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$from = 'itunes-174@mail.ru';
$subject = $_POST['subject'];
$_text = $_POST['elvismail'];
$stmt = $pdo->query($sql);
//fetch вызов данных строки
$row = $stmt->$fetch();
//выполняем запрос ($stmt это объект подготовленного запроса к бд)
$stmt = $pdo->query("SELECT first_name, last_name, email FROM email_list");
//используем fetch(этот метод достает по 1 строке за раз), это замена msqli_fetch
while ($row = $stmt->fetch()){
    echo $row['first_name'] . '' . $row['last_name'] . '' . $row['email'].
}

$dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
