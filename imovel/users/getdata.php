<?php

$imagename=$_FILES["imagem1"]["name"];

//Get the content of the image and then add slashes to it
$imagetmp=addslashes (file_get_contents($_FILES['imagem1']['tmp_name']));

//Insert the image name and image content in image_table
$insert_image="INSERT INTO image_table VALUES('$imagetmp','$imagename')";

mysql_query($insert_image);

?>
