<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8" />
	<title>Справочник</title>
	<link href="library/css/stylead.css" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="library/js/jquery.min.js"></script>
	<script type="text/javascript" src="library/js/jquery.form.js"></script>
	<script type="text/javascript" src="library/js/main.js"></script>
	
</head>

<body>
	
	<div id="form-container">
		<form id="recall-form" method="POST" enctype="multipart/form-data">
    		<button class="btn-outline-primary" type="button" id="close">X</button>
            <div class="row">
                <div class="col">
                <p>Фамилия:</p><br>
                <p>Имя</p><br>
                <p>Отчество:</p><br>
                <p>Телефон:</p><br>
                <p>Адрес:</p><br>
                </div>
                <div class="col">
                <input type="text" class="form-control" name="surname" id="surname" placeholder="Фамилия"><br>
        		<input type="text" class="form-control" name="name" id="name" placeholder="Имя"><br>
        		<input type="text" class="form-control" name="patronymic" id="patronymic" placeholder="Отчество"><br>
        		<input type="text" class="form-control" name="phone" id="phone" placeholder="Телефон"><br>
        	    <input type="text" class="form-control" name="addres" id="addres" placeholder="Адрес"><br>
        	    <input type="file" name="photoimg" id="photoimg" ><br>
                <input type="button" id="btn" value="Сохранить" ><br><br>

                </div>
                <div class="col" id="preview">
               </div>
            </div>
		</form>
	</div>

    <div id="form-del">
        <div id="form-delete">
             <button class="btn-outline-primary" type="button" id="closedel">X</button>
            <p>Вы действительно хотите удалить абонента?</p>
            <button class="btn btn-outline-primary" id="delyes">ДА</button>
            <button class="btn btn-outline-primary" id="delnot">НЕТ</button>
          
        </div>
    </div>
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
 



<div id="form-izmenenie">
        <form id="form-izm" method="POST" enctype="multipart/form-data">
            <button class="btn-outline-primary" type="button" id="closeizm">X</button>
            <div class="row">
                <div class="col">
                <p>Фамилия:</p><br>
                <p>Имя</p><br>
                <p>Отчество:</p><br>
                <p>Телефон:</p><br>
                <p>Адрес:</p><br>
                </div>
                <div class="col" id="input">

                </div>
                
              
            </div>
             <div class="row" id="previewizm">
               </div>
        </form>
    </div>


     <header class="header">
     		<nav class="nav">
     	        <p class="hello">Привет,<?=$_COOKIE['user']?></p>
     	        <button class="btn btn-outline-primary" id="give">Добавить</button>
     	        <button class="btn btn-outline-primary"  id="logout">Выйти</button>
     		</nav>
     		<p class=spravochnik>Справочник</p>



        <nav class="nav1">
        	<p>Фильтр:</p>
        	<select id="filtr1" name="filtr1">
        		<option value="surname">Фамилия</option>
        		<option value="name">Имя</option>
        		<option value="patronymic">Отчество</option>
        		<option value="phone">Телефон</option>
        		<option value="addres">Адрес</option>
        	</select>

        	<select id="filtr2" name="filtr2">
        		<option value="ASC">По алфавитному порядку</option>
        		<option value="DESC">В обратном алфавитном порядке</option>
        	</select>
            <button class="btn btn-outline-primary" id="sort">Сортировать</button>
        </nav>  
        

       <div class="php">
        <ul id="phph">
            
        </ul>
     </div>
  
</header>

</body>
</html>
