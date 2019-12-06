<?php 

$login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass=filter_var($_POST['pass'],FILTER_SANITIZE_STRING);


include "db.php";
$errors = array();
if( trim($login) == '')
{
	$errors[]='Введите логин';
	
}
elseif( $pass == '')
{
	$errors[]='Введите пароль';
}
else{
	$sql1 = 'SELECT login, pass  FROM avto WHERE login = ? ';
	$stmt1=$pdo -> prepare($sql1);
	$stmt1 -> execute(array($login));
	foreach($stmt1 as $rowlog){
		$userlog=$rowlog[0];
		$userpass=$rowlog[1];
	}
	
	if( $userlog != ''){
     if( password_verify($pass, $userpass)){
      setcookie('user', $userlog,time() + 3600*24*30*12, "/");
     }
     else{
       $errors[]='Неверно введён пароль';	
     }
 }
     else{

	$errors[]='Такого пользователя не существует';
}}
if( empty($errors)){

}
else
{
	echo $errors[0];
	exit();
}
header('Location: /');


?>
