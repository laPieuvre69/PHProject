<?php
require_once('function.php');
if(!isset($_SESSION))
    {
        session_start();
    }
if (isset($_POST["delCom"])) {
$comID = $_POST["comID"];

  deleteOneCom($comID);

}elseif (isset($_POST["modCom"])) {
  var_dump('There is a problem with the server atm, please try again later .. :(');die;
}

header('Location: page1.php');
 ?>
