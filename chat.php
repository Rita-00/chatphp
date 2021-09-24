//?login=admin1&password=1111
//?login=admin2&password=2222

<html>
<head>
    <title>Знакомство с GET-запросами</title>
</head>
<body>
<?php
$login = $_GET['login'];
$password = $_GET['password'];
$text = $_GET['text'];

if ((($login == 'admin1')&&($password == '1111'))||(($login == 'admin2')&&($password == '2222'))){
$date=date(DATE_RFC822);
$mess = json_decode(file_get_contents('bd.json'));
$add = array(
    'login' => $login,
    'text' => $text,
    'date' => $date
);
array_push($mess->text, $add);
file_put_contents('bd.json', json_encode($mess));

}
else {echo "Ошибка в логине или пароле";}

$mess = json_decode(file_get_contents('bd.json'));
foreach ($mess as $text){
    echo $mess['login'] . ": " . $mess['text'] . "<br/>";
    echo $mess['date'] . "<br/>";
}


?>
<p>
</p>
</body>
</html>