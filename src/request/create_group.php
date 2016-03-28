<?php
  session_start();  
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } catch (Exception $e) {
    die('ERROR : '.$e->getMessage());
  }
  
  if (isset($_POST['create_group_name']) AND isset($_SESSION['username'])) {
    $groupName = htmlspecialchars($_POST['create_group_name']);
    $creator = htmlspecialchars($_SESSION['username']);
    
    $req = $bdd->prepare('INSERT INTO group_users(username, name_group, date_create) VALUES(:creator, :title, NOW())');
    $req->execute(array('creator' => $creator,
                       'title' => $groupName)
                 );
    header("Location: http://localhost/cloud/src/main_window/templatemo_480_story/main_windows.php");
    exit();
  }
?>