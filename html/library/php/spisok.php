<?php 

include "db.php";
      
  $name=$_POST['name'];
  $sort=$_POST['sort'];
  $sql = "SELECT id, surname, name, patronymic FROM spisok ORDER BY ".$name." ".$sort." " ;

  $stmt=$pdo -> prepare($sql);
  $stmt -> execute();
  while($row = $stmt->fetch(PDO::FETCH_OBJ)){

  echo '<li class="li"><strong id="id">'.$row->id.'</strong><p>'.$row->surname." ".$row->name." ".$row->patronymic.'</P>

  <button class="btn btn-outline-primary" value="podrobnee" >Подробнее</button>
  <button class="btn btn-outline-primary" value="izm" >Изменить</button>
  <button class="btn btn-outline-primary" value="delete">Удалить</button>

  </li>';}
?> 


      





