<?php 

include "db.php";
  $sql = "SELECT id, surname, name, patronymic FROM spisok" ;

  $stmt=$pdo -> prepare($sql);
  $stmt -> execute();
  while($row = $stmt->fetch(PDO::FETCH_OBJ)){

  echo '<li class="li"><strong id="id">'.$row->id.'</strong><p>'.$row->surname." ".$row->name." ".$row->patronymic.'</p><button class="btn btn-outline-primary" value="podrobnee" >Подробнее</button></li>';
}
?> 


      





