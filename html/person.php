<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8" />
	<title>Справочник</title>
	<link href="library/css/styleper.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="library/js/jquery.min.js"></script>
	<script type="text/javascript" src="library/js/jquery.form.js"></script>
	<script type="text/javascript" src="library/js/mainperson.js"></script>
	
</head>

<body>
	
	
    <div id="form-logout">
        <div id="form-log">
            <button class="btn-outline-primary" type="button" id="closelog">X</button>
            <p>Вы действительно хотите выйти?</p>
            <a class="btn btn-outline-primary" href="library/php/logout.php" >ДА</a>
            <button class="btn btn-outline-primary" id="lognot">НЕТ</button>
        </div>
    </div>


    <div id="form-podrob">
        <div class="row" id='form-pod'>
        <button class="btn-outline-primary" type="button" id="closepod">X</button>
            <div class="col">
                <p>Фамилия:</p><br>
                <p>Имя</p><br>
                <p>Отчество:</p><br>
                <p>Телефон:</p><br>
                <p>Адрес:</p><br>
            </div>
            <div class="col" id="prosmotr">    
            </div>     
        </div> 
          
    </div>

     <header class="header">
     		<nav class="nav">
     	        <p id="hello">Привет,<?=$_COOKIE['user']?></p>
     	        <button class="btn btn-outline-primary"  id="logout">Выйти</button>
     		</nav>
     		<p class=spravochnik>Справочник</p> 
        </nav>  
        

       <div class="php">

        <ul id="phph">
            
        </ul>
     </div>
  
</header>

</body>
</html>
