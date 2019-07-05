<?php
require_once('function.php');
// const DBName = 'mysql:dbname=db9gag';

$date = date('Y-m-d H:i:s');
var_dump($_POST['content'],
 $_POST['user_id'],
  $_POST['CreationDate'],
   $_POST['postID']);
$connec = new PDO(DBName, 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request= $connec->prepare("UPDATE Posts SET photoAdress = :photoAdress, User_id = :User_id, CreationDate = :CreationDate WHERE id = :id ");
$request->bindParam(':photoAdress', $_POST['content']);
$request->bindParam(':User_id', $_POST['user_id']);
$request->bindParam(':CreationDate', $date);
$request->bindParam(':id', $_POST['postID']);
$request->execute();

return header('Location: page1.php');



 ?>
