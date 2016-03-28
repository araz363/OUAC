<?php
  session_start();  
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } catch (Exception $e) {
    die('ERROR : '.$e->getMessage());
  }
  
  if (isset($_SESSION['username'])) {
    $creator = htmlspecialchars($_SESSION['username']);
    
    $req = $bdd->prepare('SELECT creator, group_name FROM group WHERE creator = :creator OR member = :member');
    $req->execute(array('creator' => $creator,
                       'member' => $creator)
                 );
    exit();
  }
?>