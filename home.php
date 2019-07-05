<?php
session_destroy();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>10gag</title>
  </head>
  <body>
    <div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-4">

    <div class="card">
    <div class="title card-header">
      <h1>welcome to 10gag</h1>
    </div>
    <h3>Login</h3>
    <div class="connection card-body">
      <form class="" action="./registerController.php" method="post">
        <label for="Nom">User Name :</label>
        <input type="text" name="name" value="" required>
        <br>
        <br>
        <label for="password">Password :</label>
        <input type="password" name="password" value="" required>
        <br>
        <br>
        <input class="btn btn-success" type="submit" name="" value="login !">
      </form>
      <br>
      <br>
        <div class="">
          <p>Not yet registered? </p>
        <a href="./register.php">Register</a>
      </div>
    </div>
      </div>
      </div>
      <div class="col-sm-4"></div>
  </div>
</div>
  </body>
  </html>
