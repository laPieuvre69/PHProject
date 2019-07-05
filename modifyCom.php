<?php
require_once('function.php');
// const DBName = 'mysql:dbname=db9gag';

$date = date('Y-m-d H:i:s');

$connec = new PDO(DBName, 'root', '0000');
$connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request= $connec->prepare("UPDATE usersCommentVotePosts SET comment = :content, Users_id = :User_id, currentDate = :CreationDate WHERE id = :id ");
$request->bindParam(':content', $_POST['content']);
$request->bindParam(':User_id', $_POST['user_id']);
$request->bindParam(':CreationDate', $date);
$request->bindParam(':id', $_POST['comID']);
$request->execute();

return;
