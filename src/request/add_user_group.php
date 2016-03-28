<?php
  session_start();  
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } catch (Exception $e) {
    die('ERROR : '.$e->getMessage());
  }
  
  if (isset($_POST['add_user']) AND isset($_POST['join_group'])) {
    $groupName = htmlspecialchars($_POST['join_group']);
    $user = htmlspecialchars($_POST['add_user']);
    
    $req = $bdd->prepare('INSERT INTO group_users(member, name_group) VALUES(:user, :group)');
    $req->execute(array('user' => $user,
                       'group' => $groupName)
                 );
    /**header("Location: http://localhost/cloud/src/file_window/file_window.php");*/
    exit();
  }
?>