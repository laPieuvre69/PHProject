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
    <h3>Register</h3>

    <div class="card-body">
      <form method="post" action="authentification.php">
        <label>User Name :</label>
        <input type="text" name="name" required>
        <br>
        <br>
        <label>Password :</label>
        <input type="password" name="password" required>
        <br>
        <br>
        <input type="submit" class="btn btn-success"value="register !">
      </form>
      <br>
      <br>
      <div class="">
        <p>already registered? </p>
        <a href="./home.php">Login</a>
      </div>
    </div>
      </div>
      </div>
      <div class="col-sm-4"></div>
  </div>
</div>
  </body>
  </html>
