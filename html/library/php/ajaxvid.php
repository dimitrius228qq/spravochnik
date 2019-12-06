<?php
include "db.php";

$id=$_POST['id'];

$sql = "SELECT surname, name, patronymic, phone, addres, picture FROM spisok WHERE id = ?  ";
$stmt=$pdo -> prepare($sql);
$stmt -> execute(array($id));

foreach($stmt as $row){
$surname=$row[0];
$name=$row[1];
$patronymic=$row[2];
$phone=$row[3];
$addres=$row[4];
$picture=$row[5];

}

$result=array('surname' => $surname,'name' => $name,'patronymic' => $patronymic,'phone' => $phone,'addres' => $addres,'picture' => $picture);
echo json_encode($result);



?>