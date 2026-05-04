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

$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$email = $_POST['email'] ?? '';

$dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
$pdo = new PDO($dsn, $user, $pass, $options);
$sql = "INSERT INTO email_list (first_name, last_name, email)
VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt ->execute([
    $firstname, $lastname, $email
]);
} catch (PDOException $e) {
die("Ошибка подключения или записи в БД: " . $e->getMessage());
}

echo "<h2>great!well done!</h2>";
?>