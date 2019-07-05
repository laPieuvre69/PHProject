<?php

const DBName = 'mysql:dbname=db9gag';


session_start();


function getAllUser() {
  $request = '
  SELECT *
  FROM  Users
  ';
  $connec = new PDO( DBName, 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare($request);
  $request->execute();
  return $request->fetchAll();
}

function getConnectedUser($userName) {
  $request = '
  SELECT id
  FROM  Users
  WHERE name = :name
  ';
  $connec = new PDO(DBName, 'root', '0000');

  $request = $connec->prepare("SELECT id FROM Users WHERE name = :name");
  $request->bindParam(':name', $userName);
  $request->execute();
  return $request->fetch(PDO::FETCH_ASSOC);
}


function getAllPosts() {
  $request = '
  SELECT *
  FROM  Posts
  ORDER BY id DESC
  ';
  $connec = new PDO(DBName, 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare($request);
  $request->execute();
  return $request->fetchAll(PDO::FETCH_ASSOC);
}
function getThisPost($qRealID) {

  $connec = new PDO(DBName, 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("SELECT * FROM Posts WHERE User_id = :User_id");
  $request->bindParam(':User_id', $qRealID);
  $request->execute();
  return $request->fetchAll(PDO::FETCH_ASSOC);
}

function getuserByID($posterID) {

  $connec = new PDO(DBName, 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare("SELECT name FROM Users WHERE id = :id");
  $request->bindParam(':id', $posterID);
  $request->execute();
  return $request->fetch(PDO::FETCH_ASSOC);
}

function deleteOnePost($postID) {
  $connec = new PDO(DBName, 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare('DELETE FROM Posts WHERE id = :id');
  $request->execute([
    ":id" => $postID,
  ]);
}

function deleteOneCom($comID) {
  $connec = new PDO(DBName, 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare('DELETE FROM usersCommentVotePosts WHERE id = :id');
  $request->execute([
    ":id" => $comID,
  ]);
}

function getAllComments() {
  $request = '
  SELECT *
  FROM  usersCommentVotePosts
  ';
  $connec = new PDO(DBName, 'root', '0000');
  $connec->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $request = $connec->prepare($request);
  $request->execute();
  return $request->fetchAll();
}
