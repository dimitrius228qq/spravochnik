<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta  http-equiv="X_UA_Compatible" content="ie=edge">
	<title>Форма регистрации и авторизации</title>
	<link href="library/css/style1.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
<?php 
include('library/php/db.php');
$sql = "CREATE TABLE avto (login TEXT,mail TEXT,pass TEXT)";
$stmt=$pdo -> prepare($sql);
$stmt -> execute();
$sql1 = "CREATE TABLE spisok (id INT  NOT NULL ,surname TEXT, name TEXT,patronymic TEXT, phone TEXT , addres TEXT , picture TEXT, PRIMARY KEY(id))";

$stmt=$pdo -> prepare($sql1);
$stmt -> execute();
?>
<?php
 if($_COOKIE['user']==''):
?>

	<div class="row">
      <div class="col">

	  <form action="library/php/index.php" method="post">
		<h1>Форма регистрации</h1>
		<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
		<input type="text" class="form-control" name="mail" id="mail" placeholder="Введите E-mail"><br>
		<input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
		<input type="password" class="form-control" name="pass2" id="pass2" placeholder="Введите пароль ещё раз"><br>
		<button class="btn btn-success" type="submit">Регистрация</button>
    </form>
	</div>

		<div class="col" id="auth">
	<form action="library/php/auth.php" method="post">
		<h1>Форма авторизации</h1>
		<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
		<input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
		<button class="btn btn-success" type="submit">Авторизация</button>
    </form>
</div>
</div>

<?php elseif($_COOKIE['user']=='admin'): ?>
<script language="JavaScript" type="text/javascript">
	location="admin.php"
</script>

<?php else: ?>

<script language="JavaScript" type="text/javascript">
	location="person.php"
</script>

<?php endif; ?>

</div>

</body>
</html>
