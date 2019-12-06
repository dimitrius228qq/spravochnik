<?php 


include "db.php";
$path = "../../uploads/";
$id=$_POST['id'];
$surname=filter_var(trim($_POST['surname']),FILTER_SANITIZE_STRING);
$name=filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$patronymic=$_POST['patronymic'];
$phone=$_POST['phone'];
$addres=$_POST['addres'];
$errors = array();
if($surname == '')
{
	echo 'Введите фамилию';
	exit;
}
if($name == '')
{
	echo'Введите имя';
	exit;
}
if( $patronymic == '')
{
	echo 'Введите отчество';
	exit;
}
if( $phone == '')
{
	echo 'Введите мобильный номер';
	exit;
}
if( $addres == '')
{
	echo'Введите адрес';
	exit;	
}

$sql = "SELECT phone, picture FROM spisok WHERE id = ?  ";
$stmt=$pdo -> prepare($sql);
$stmt -> execute(array($id));
foreach($stmt as $row){
$filename=$row[1];
$phonenumber=$row[0];
}


$sql2 = "SELECT phone FROM spisok WHERE phone = ?  ";
$stmt2=$pdo -> prepare($sql2);
$stmt2 -> execute(array($phone));
foreach($stmt2 as $rowphone){
$phoneprov=$rowphone[0];
}
if($phoneprov=='' | $phonenumber==$phoneprov){


$dir=opendir($path);
while(($file=readdir($dir))){
if((is_file("$path/$file")) && ("$path/$file" == "$path/$filename"))
{
	unlink("$path/$file");

}
}
closedir($dir);

$sql = "DELETE FROM spisok  WHERE id = ?  ";
$stmt=$pdo -> prepare($sql);
$stmt -> execute(array($id));



	$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
		
			$namefile = $_FILES['photo']['name'];
			$size = $_FILES['photo']['size'];
			
			if(strlen($namefile))
				{
					list($txt, $ext) = explode(".", $namefile);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photo']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
								  

									$sql = "INSERT INTO spisok(id, surname, name, patronymic, phone , addres, picture)    VALUES(:id, :surname, :name, :patronymic,:phone,:addres, :picture)";
									$params2=[':id' => $id,':surname' => $surname , ':name' => $name,':patronymic' => $patronymic,':phone' => $phone , ':addres' => $addres,':picture' => $actual_image_name];
									$stmt2=$pdo -> prepare($sql);
									$stmt2 -> execute($params2);
                                    echo  "данные изменены";
                                    exit;
								
								}
							else
								echo "faaailed";
							exit;
						}
						else
						echo "Image file size max 1 MB";
						exit;					
						}
						else
						echo "Invalid file format..";
						exit;	
				}
				
		}else
		{
			echo 'Такой пользователь существует';
			exit;
		}












		



?>