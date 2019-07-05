<?php
require_once('function.php');
// const DBName = 'mysql:dbname=db9gag';
if(!isset($_SESSION))
    {
        session_start();
    }
$_SESSION['postSection'] = $_POST['postSection'];
$postContent = $_SESSION['postSection'];
$sessName = $_SESSION['name'];

$_SESSION['photoOnPost'] = $_POST['photoOnPost'];
$photoOnPost = $_SESSION['photoOnPost'];
  // var_dump($sessName, $userName, $_SESSION['name'] );
// function getConnectedUser($userName) {
//   $request = '
//   SELECT id
//   FROM  Users
//   WHERE name = :name
//   ';
//   $connec = new PDO('mysql:dbname=db9gag', 'root', '0000');
//
//   $request = $connec->prepare("SELECT id FROM Users WHERE name = :name");
//   $request->bindParam(':name', $userName);
//   $request->execute();
//   return $request->fetch(PDO::FETCH_ASSOC);
// }


$me = getConnectedUser($sessName);
$myID = $me['id'];
$date = date('Y-m-d H:i:s');

if (empty($photoOnPost)) {
  $photoOnPost = 'empty';
}
// var_dump($photoOnPost);die;

$connec = new PDO(DBName, 'root', '0000');
 $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $request = $connec->prepare('INSERT INTO Posts (user_id, content, CreationDate, photoAdress) VALUES (:user_id, :content, :CreationDate, :photoAdress)');
 $request->execute([
   ":user_id" => $myID,
   ":content" => $postContent,
   ":CreationDate" => $date,
   ':photoAdress' => $photoOnPost,
 ]);
header('Location: page1.php');
