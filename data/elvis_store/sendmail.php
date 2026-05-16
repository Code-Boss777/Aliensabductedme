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
$dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
$output_form = false;
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
    // СОЗДАЕМ ПЕРЕМЕННУЮ $pdo
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
//так же используют в запросах DELETE и тд.
//функции empty проверяет содержит ли переменная какие либо данные 
//функция isset проверяет присвоено ли какое либо значение переменной
if(!empty($subject)){
    if(!empty($text)){
//сократить объем кода можн при помощи логических операторов AND(&&), OR(||)
// if((!empty($subject))&&(!empty($text)))
$sql = "SELECT first_name, last_name, email FROM email_list";
$stmt = $pdo->query($sql);
//fetch вызов данных строки
$row = $stmt->fetch();
//выполняем запрос ($stmt это объект подготовленного запроса к бд)
$stmt = $pdo->query("SELECT first_name, last_name, email FROM email_list");
//используем fetch(этот метод достает по 1 строке за раз), это замена msqli_fetch

while ($row = $stmt->fetch()){
    echo $row['first_name'] . ' ' . $row['last_name'] . ' ' . $row['email'] . '<br />';
}
    }
}
// else выполнится, если if получит false
else {
    echo "no data for send" <br/>; 
}
//управляющая конструкция if, формируем для исключения пустых писем

// if($subject == '') {
//     if($text == ''){
//         echo 'give me more infotrmation in your email. <br/>;
//     }
// }

//функции empty проверяет содержит ли переменная какие либо данные 
//функция isset проверяет присвоено ли какое либо значение переменной
// if(empty($subject)) {
//     if(empty($text)) {
//         echo 'give me more infotrmation in your email. <br/>;
//     }
// }

//оператор отрицания !(воскл знак), реверсирует логику функции.
// if(!empty($subject)) {
//     if(!empty($text)) {
// echo "no reaection";
//     }
// };
if ($output_form){
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<label for="subject">Email Theme</label>
<input type="text" name="subject" id="subject" value="<?php echo $subject; ?>" /><br/>
<label for="elvismail">Email data</label>
<textarea name="elvismail" id="elvismail" rows="8" cols="60"></textarea><br/>
<input type="submit" name="submit" value="<?php echo $text; ?>">
    </form>
    <?php
}
if (isset($_POST['submit'])){
    ...
}


?>

