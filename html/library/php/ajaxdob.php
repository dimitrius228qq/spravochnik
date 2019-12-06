<?php
include "db.php";
$path = "../../uploads/";
$surname=$_POST['surname'];
$name=$_POST['name'];
$patronymic=$_POST['patronymic'];
$phone=$_POST['phone'];
$addres=$_POST['addres'];


if($surname == '')
{
	echo'Введите фамилию';
	exit;
}
if($name == '')
{
	echo'Введите имя';
	exit;
}
if( $patronymic == '')
{
	echo'Введите отчество';
	exit;
}
if( $phone == '')
{
	echo 'Введите мобильный номер';
	exit;
}
if( $addres == '')
{
	echo 'Введите адрес';
	exit;	
}

$sql2 = "SELECT phone FROM spisok WHERE phone = ?  ";
$stmt2=$pdo -> prepare($sql2);
$stmt2 -> execute(array($phone));
foreach($stmt2 as $row){
$phoneprov=$row[0];
}
	if($phoneprov==''){
	$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$namefile = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($namefile))
				{
					list($txt, $ext) = explode(".", $namefile);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
								    $sql = "SELECT MAX(id) FROM spisok ";
									$stmt2=$pdo -> prepare($sql);
									$stmt2 -> execute();
									foreach($stmt2 as $rowcount){
									$count=$rowcount[0];
									}
									$count+=1;

									$sql = "INSERT INTO spisok(id, surname, name, patronymic, phone , addres, picture)    VALUES(:id, :surname, :name, :patronymic,:phone,:addres, :picture)";
									$params2=[':id' => $count,':surname' => $surname , ':name' => $name,':patronymic' => $patronymic,':phone' => $phone , ':addres' => $addres,':picture' => $actual_image_name];
									$stmt2=$pdo -> prepare($sql);
									$stmt2 -> execute($params2);
									
                                    echo "пользователь добавлен";
                                    exit;
								
								}
							else{
								echo "faaailed";
							
							exit;}
						}
						else{
						echo "Image file size max 1 MB";
						exit;}					
						}
						else{
						echo "Invalid file format..";	
					exit;}
				}
				
			else{
				echo "Please select image..!";
			
				
			exit;}
		}
	}else{
			echo 'Такой пользователь существует';
			exit;
		}
		
?>