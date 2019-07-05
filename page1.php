<?php
require_once('function.php');
if(!isset($_SESSION))
    {
        session_start();
    }

if (isset($name)) {
  $sessName = $name;
}elseif (isset($userName)) {
  $sessName = $userName;
}
$sessName = $_SESSION['name'];

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">

  </head>
  <script src="https://code.jquery.com/jquery-3.4.1.js">
</script>
<script type="text/javascript">
    $(document).ready(function() {
      $(".submit").click(function(event) {
        event.preventDefault();
        let postID = event.currentTarget.attributes[1].nodeValue
        let poster = event.currentTarget.attributes[2].nodeValue
        let posterID = event.currentTarget.attributes[3].nodeValue
        let newDate = new Date();
        let inside = ('p'+ postID);
        let insideP = event.currentTarget.attributes[0].nodeValue
        let edited = prompt("Please enter your new text:", insideP );
        if (edited === null) {
        return; //break out of the function early
    }
        $("p."+inside).text(edited + ". Posted by " + poster + " At " + newDate)

        let param = {};
        param.content = edited;
        param.postID = postID;
        param.user_id = posterID
        param.CreationDate = newDate;

        $.post({
              type: "POST",
              url: "modifyPost.php",
              data: param,
              success: function (response) {
                console.log(response);
              }
          });

            return false;
        });
        $(".picture").click(function(event) {
          event.preventDefault();
          let postID = event.currentTarget.attributes[1].nodeValue
          let poster = event.currentTarget.attributes[2].nodeValue
          let posterID = event.currentTarget.attributes[3].nodeValue
          let newDate = new Date();
          let inside = ('m'+ postID);
          console.log(inside);
          let insideP = event.currentTarget.attributes[0].nodeValue
          let edited = prompt("Link image adress here:", "photo adress.." );
          if (edited === null) {
          return; //break out of the function early
      }
          $("img."+inside).attr('src', edited)

          let param = {};
          param.content = edited;
          param.postID = postID;
          param.user_id = posterID
          param.CreationDate = newDate;

          $.post({
                type: "POST",
                url: "addPhoto.php",
                data: param,
                success: function (response) {
                  console.log(response);
                }
            });

              return false;
          });
          $(".com").click(function(event) {
            event.preventDefault();
            let comID = event.currentTarget.attributes[1].nodeValue
            let commenter = event.currentTarget.attributes[2].nodeValue
            let commenterID = event.currentTarget.attributes[3].nodeValue
            let newDate = new Date();
            let inside = ('c'+ comID);
            console.log(inside);
            let insideP = event.currentTarget.attributes[0].nodeValue
            let edited = prompt("edit comment here:", insideP );
            if (edited === null) {
            return; //break out of the function early
        }
            $("div."+inside).text(edited + ". Commented by " + commenter + " At " + newDate)

            let param = {};
            param.content = edited;
            param.comID = comID;
            param.user_id = commenterID;
            param.CreationDate = newDate;

            $.post({
                  type: "POST",
                  url: "modifyCom.php",
                  data: param,
                  success: function (response) {
                    console.log(response);
                  }
              });

                return false;
            });
      });
  </script>


  <body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5">



<form style="margin-bottom:20px" method="GET">
   <input type="search" name="q" placeholder="search for user..." />
   <input class="btn btn-info"type="submit" value="Valider" />
</form>
<?php

if ($sessName == 'admin') {
  ?><h1 class="margin" style="color:white"> All hail the mighty <?= $sessName ?> !!</h1><?php
}else {
   ?><h1 class="margin" style="color:white"> Welcome to 10gag: <?= $sessName ?> !!</h1><?php
} ?>

    <form class="card margin" action="Posts.php" method="post">
      <div class="card-body">
        <h3>Share with us here:</h3>
        <textarea name="postSection" cols="40" rows="5" required></textarea>
        <br>
        <label>Link a picture address here(optionnal):</label>
        <br>
      <input type="text" name="photoOnPost" cols="40" value="">
        <input type="hidden" name="nameAgain" value="<?= $sessName ?>">
        <input class="btn btn-info"type="submit" name="subPost" value="Post-it!">
      </div>
    </form>
    <?php
    if(isset($_GET['q']) AND !empty($_GET['q'])) {
      $q = htmlspecialchars($_GET['q']);
      $qID = getConnectedUser($q);
      $qRealID = $qID['id'];
      $posts = getThisPost($qRealID);
    }else {
      $posts = getAllPosts();
    }
      $coms = getAllComments();

      $meCommenterID = getConnectedUser($sessName);
      $meID = $meCommenterID['id'];

    foreach ($posts as $post) {
       $postID = $post["id"];
       $posterID = $post["User_id"];
       $postMan = getuserByID($posterID);

    ?>
      <div class="card margin">
          <p class="<?= "p".$postID ?> card-body"><?= $post['content']?></p>
          <p class="card-header"> Posted by  <?= $postMan['name'] ?>  At <?= $post["CreationDate"] ?></p>
            <?php if (isset($post["photoAdress"])) :?>
              <div class="imgHere">

                <img class="<?= "m".$postID ?>" src="<?= $post["photoAdress"] ?>" alt="">
              </div>
          <?php  endif ?>
          <?php if ($meCommenterID['id'] == $posterID || $sessName == 'admin'): ?>
          <?php if ((!isset($post["photoAdress"])) || $post["photoAdress"] == 'empty' ) :?>



            <form class='' action='addPhoto.php' method='post'>
              <input type="hidden" name="" value="<?= $postID ?>">
              <input data-content="<?= $post['content'] ?>" data-value="<?= $postID ?>" data-poster="<?=$postMan['name']?>" data-posterID="<?=$post["User_id"]?>" class="picture btn btn-info" type="submit" name="pic" value="Add a photo">
            </form>
          <?php endif ?>
          <div class="btnAction">


          <form class='' action='modiletePost.php' method='post'>
            <input type="hidden" name="postID" value="<?= $postID ?>">
            <input data-content="<?= $post['content'] ?>" data-value="<?= $postID ?>" data-poster="<?=$postMan['name']?>" data-posterID="<?=$post["User_id"]?>" class="submit btn btn-info" type="submit" name="mod" value="edit post">
          </form>
          <form class='' action='modiletePost.php' method='post'>
            <input type="hidden" name="postID" value="<?= $postID ?>">
            <input type="submit" class="btn btn-danger" name="del" value="delete post">
          </form>
          </div>
        <?php  endif ?>
          <form class='comSec' action='addComment.php' method='post'>
            <input type="hidden" name="postID" value="<?= $postID ?>">
            <input type="hidden" name="meID" value="<?= $meID ?>">
            <textarea name="comments" cols="40" rows="5" placeholder="comment here.."></textarea>
            <input class="submitComment btn btn-info" type="submit" name="comSub" value="Comment">
          </form>
          <?php foreach ($coms as $com): ?>
          <?php  $commenter = getuserByID($com['Users_id']);
         if ($com['Posts_id'] == $post["id"]): ?>
          <div class="comSection borderCom">
            <div class="<?= "c".$com['id'] ?> card-body">
              <?= $com['comment'] ?>
            </div>
            <div class="card-header">
               Commented by:<?= $commenter['name'] ?>   At: <?= $com['currentDate'] ?>
            </div>
            <?php if ($meCommenterID['id'] == $com['Users_id'] || $sessName == 'admin'): ?>

          <form class="modilete" action="modileteCom.php" method="post">
            <input type="hidden" name="comID" value="<?= $com['id'] ?>">
            <input data-content="<?= $com['comment'] ?>" data-value="<?= $com['id'] ?>" data-poster="<?= $commenter['name'] ?>" data-posterID="<?=$com["Users_id"]?>" class="com btn btn-info" type="submit" name="modCom" value="modify Comment">
            <input type="submit" class="btn btn-danger" name="delCom" value="delete Comment">
          </form>
        <?php endif; ?>
          </div>
        <?php endif; ?>
        <?php endforeach; ?>

      </div>
<?php }?>
</div>
<div class="col-md-3">
<a href="/" class="logout btn btn-success">logout</a>
</div>
</div>
</div>
  </body>
</html>
