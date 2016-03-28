<?php
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } catch (Exception $e) {
    die('ERROR : '.$e->getMessage());
  }
  
  if (isset($_POST['username']) AND isset($_POST['password'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    $req = $bdd->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
    $req->execute(array('username' => $username,
                       'password' => $password)
                 );
    
    if (!$req->fetch()) {
      header("Location: http://localhost/cloud/src/index.php");
    } else {
      session_start();
      $_SESSION['username'] = $username;
      header("Location: http://localhost/cloud/src/main_window/templatemo_480_story/main_windows.php");
    }
    $req->closeCursor();
    exit();
  }
?>
