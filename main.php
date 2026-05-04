<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Информация о похищении</title>
</head>
<body>
    <h2>Космические пришельцы похищали меня</h2>
<?php
//настройка базы данных
$host = 'localhost';
$db_name = 'database.sql';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
//сбор данных из формы 
$firstname = $_POST['firstname'] ?? '';
$lastname = $_PSOT['lastname'] ?? '';
$when_it_happened = $_POST['whenithappened'] ?? '';
$how_long = $_POST['howlong'] ?? '';
$how_many = $_POST['howmany'] ?? '';
$alien_description = $_POST['aliendescription'] ?? '';
$what_they_did = $_POST['whattheydid'] ?? '';
$fang_spotted = $_POST['fangspotted'] ?? '';
$other = $_POST['other'] ?? '';
$email = $_POST['email'] ?? '';
$full_name = trim($firstname . ' ' . $lastname);

//подключение к базе данных 
$dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
$pdo = new PDO($dsn, $user, $pass, $options);
$sql = "INSERT INTO alien_abducted (first_name, last_name, when_it_happened, how_long, 
how_many, alien_description, what_they_did, fang_spotted, other, email)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
//выполнение записи в базу
$stmt->execute([
     $firstname, $lastname, $when_it_happened, $how_long,
     $how_many, $alien_description, $what_they_did, $fang_spotted, $other, $email
]);
echo "<h3>Thanks data in base now</h3>";
//Отправка Email
$to = 'itunes-174@mail.ru';
$subject = 'new abducted msg!';
$msg = "Пользователь $full_name сообщил о похищении.\n" .
           "Когда это случилось: $when_it_happened\n" .
           "Как долго отсутствовал: $how_long\n" .
           "Что делали пришельцы: $what_they_did\n" .
           "Доп. инфо: $other";
// mail($to, $subject, $msg);
} catch (PDOException $e) {
die("Ошибка подключения или записи в БД: " . $e->getMessage());
}
?>
<script>
const test = document.querySelector('h2');
test.addEventListener('mouseover', () => {
    test.style.color = 'red';
    test.innerText = 'RuN Bitch!Aliens r  here!!';
});
test.addEventListener('mouseout', () => {
    test.style.color = 'black';
    test.innerText = 'Космические пришельцы похищали меня';
});
</script>


    <?php
        // $dbc = mysqli_connect($host, $user, $pass, $db_name)
        // OR die("error bitch: " . mysql_connect_error());
        // echo "zaebumba";
        // // $result = mysqli_query($dbc, $query);
    ?>
    <?php
    //    $result = msqli_query($dbc, $query)
    //    or die("not connect bitch");
    ?>
</body>
</html>