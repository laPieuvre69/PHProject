<?php
require_once('function.php');
if(!isset($_SESSION))
    {
        session_start();
    }

    // const DBName = 'mysql:dbname=db9gag';

$users = getAllUser();
$_SESSION['name'] = $_POST['name'];
$userName = $_SESSION['name'];
$_SESSION['password'] = $_POST['password'];
$userPassword = $_SESSION['password'];
$hashedPassword = password_hash($userPassword, PASSWORD_BCRYPT);


foreach ($users as $key => $user) {
   if (in_array($userName, $user)) {
     //mettre dans une alarme
     echo "<p>WHOOOPS !</p>";
     echo "<div> username already used </div>";
    //  echo "<br>";
      echo "<button><a href='./register.php'>back to register</a></button>";
      return true;
   }else {
     echo "";
   }
 }
 session_start();
 $connec = new PDO(DBName, 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare('INSERT INTO Users (name, password) VALUES (:name, :password)');
  $request->execute([
    ":name" => $userName,
    ":password" => $hashedPassword,
  ]);
    header('Location: page1.php');


?>
