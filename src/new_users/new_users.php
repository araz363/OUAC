<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>Once Upon a Cloud</title>
  <link rel="stylesheet" href="../../static/css/normalize.css">
  <link rel="stylesheet" href="../../static/css/index.css">
  
</head>

<body>
  <div class="wrapper">
    <form method="post" name="form-signUp" class="login" action="new_users.php">
      <p class="title">Registration</p>
      <input name="username" id="username" type="text" placeholder="Username" autofocus/>
      <i class="fa fa-user"></i>
      <input name="password" id="password" type="password" placeholder="Password" />
      <i class="fa fa-key"></i>
      <button id="btn-signUp">
        <i class="spinner"></i>
        <span class="state">Sign Up</span>
      </button>
    </form>
    <footer><a target="blank" href="http://boudra.me/">boudra.me</a></footer>
    </p>
  </div>
  <div class="ouac">
    <h1 class="brand">Once Upon A Cloud</h1> 
  </div>
<?php
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } catch (Exception $e) {
    die('ERROR : '.$e->getMessage());
  }
  
  if (isset($_POST['username']) AND isset($_POST['password'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    
    $req = $bdd->prepare('INSERT INTO users(username, password) VALUES(:username, :password)');
    $req->execute(array('username' => $username,
                       'password' => $password)
                 );
    session_start();
    $_SESSION['username'] = $username;
    header("Location: http://localhost/cloud/src/main_window/templatemo_480_story/main_windows.php");
    exit();
  }
?>
</body>