<?php

$login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$mail=filter_var(trim($_POST['mail']),FILTER_SANITIZE_STRING);
$pass=filter_var($_POST['pass'],FILTER_SANITIZE_STRING);
$pass_2=filter_var($_POST['pass2'],FILTER_SANITIZE_STRING);

include "db.php";
$sql2 = "SELECT login FROM avto WHERE login = ?  ";
$stmt2=$pdo -> prepare($sql2);
$stmt2 -> execute(array($login));
foreach($stmt2 as $rowlog){
$userlog=$rowlog[0];

}

$sql3 = "SELECT mail FROM avto WHERE mail = ?  ";
$stmt3=$pdo -> prepare($sql3);
$stmt3 -> execute(array($mail));
foreach($stmt3 as $rowmail){
$usermail=$rowmail[0];

}

$errors = array();
if( trim($login) == '')
{
	$errors[]='Введите логин';
	
}
if( trim($mail) == '')
{
	$errors[] = 'Введите E-mail';
	

}
if( $pass == '')
{
	$errors[]='Введите пароль';
}
if( $pass_2 != $pass)
{
	$errors[] = 'Повторный пароль введён неверно';
}

if( $usermail != '')
{

	echo 'Данный E-mail уже авторизован';
	exit();
}  
if( $userlog != '')
{

	echo 'Данный логин уже авторизован';
	exit();
}  


if( empty($errors)){
$pass = password_hash($pass, PASSWORD_DEFAULT);
$sql1 = 'INSERT INTO avto (login, mail, pass)  VALUES(:login,:mail,:pass)';
$params1=[':login' => $login,':mail' => $mail , ':pass' => $pass];
$stmt1=$pdo -> prepare($sql1);
$stmt1 -> execute($params1);
header('Location: /');
}
else
{
	echo $errors[0];
	exit();
}


?> 
