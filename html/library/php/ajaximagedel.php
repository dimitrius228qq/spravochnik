<?php
include "db.php";
$id=$_POST['id'];

$sql1 = "SELECT picture FROM spisok WHERE id = ?  ";
$stmt=$pdo -> prepare($sql1);
$stmt -> execute(array($id));
foreach($stmt as $row){
$filename=$row[0];
}
$path = "../../uploads";


$dir=opendir($path);
while(($file=readdir($dir))){
if((is_file("$path/$file")) && ("$path/$file" == "$path/$filename"))
{
	unlink("$path/$file");

}
}
closedir($dir);



$sql1 = "DELETE FROM spisok  WHERE id = ?  ";
$stmt=$pdo -> prepare($sql1);
$stmt -> execute(array($id));



$result=array('id' => $id);
echo json_encode($result);
?>