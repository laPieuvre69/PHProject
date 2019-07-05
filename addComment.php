<?php
require_once('function.php'); 
// const DBName = 'mysql:dbname=db9gag';

$date = date('Y-m-d H:i:s');

$connec = new PDO(DBName, 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request= $connec->prepare('INSERT INTO usersCommentVotePosts (Users_id, Posts_id, comment, currentDate ) VALUES (:Users_id, :Posts_id, :comment, :currentDate)');
$request->bindParam(':Users_id', $_POST['meID']);
$request->bindParam(':Posts_id', $_POST['postID']);
$request->bindParam(':comment', $_POST['comments']);
$request->bindParam(':currentDate', $date);
$request->execute();

return header('Location: page1.php');;


 ?>
