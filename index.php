<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Once Upon a Cloud</title>
  <link rel="stylesheet" href="./static/css/normalize.css">
  <link rel="stylesheet" href="./static/css/index.css">
</head>

<body>
  <div class="wrapper">
    <form method="post" name="form-login" class="login" action="./src/request/login.php">
      <p class="title">Log in</p>
      <input name="username" id="username" type="text" placeholder="username" autofocus/>
      <i class="fa fa-user"></i>
      <input name="password" id="password" type="password" placeholder="password" />
      <i class="fa fa-key"></i>
      <p class="sign-up">New user ?<a href="./src/new_users/new_users.php"> Sign up</a></p>
      <button id="login_btn">
        <i class="spinner"></i>
        <span class="state">Log in</span>
      </button>
    </form>
    <footer><a target="blank" href="http://boudra.me/">boudra.me</a></footer>
    </p>
  </div>
  <div class="ouac">
    <h1 class="brand">Once Upon A Cloud</h1>
  </div>
  <script src="./src/index.js"></script>
</body>
</html>