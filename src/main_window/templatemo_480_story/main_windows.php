<?php
  session_start();
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Once Upon a Cloud</title>
    <!--
The Story Theme
http://www.templatemo.com/tm-480-story
-->
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/flexslider.css">
    <!-- Flexslider style -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!-- Templatemo style -->
    <link rel="stylesheet" href="./main_windows.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
  </head>

  <body class="page">


    <!-- background images -->
    <div class="page-bg-imgs-list">
      <img src="../../../static/pictures/clouds.jpg" id="page-1-img" class="main-img" alt="About">
      <img src="img/story-bg-2.jpg" id="page-2-img" alt="Gallery">
      <img src="img/story-bg-3.jpg" id="page-3-img" alt="Services">
      <img src="img/story-bg-4.jpg" id="page-4-img" alt="Contact">
    </div>

    <div class="container-fluid">

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">

          <div class="header">

            <!-- site title -->
            <header class="box box-white">
              <a href="javascript:void(0)" class="js-site-title">
                <h1 class="box-text site-title-text">Once Upon a Cloud</h1>
              </a>
            </header>

            <!-- site navigation -->
            <nav class="js-nav">
              <ul class="nav-items-container">

                <li data-nav-item-id="page-1" class="block-keep-ratio block-keep-ratio-1-1 block-width-half box box-white box-nav-item js-nav-item pull-xs-left">
                  <a href="#page-1" class="block-keep-ratio-content box-nav-item-link">
                    <span class="box-text box-text-nav-item flexbox-center">Files</span>
                  </a>
                </li>

                <li data-nav-item-id="page-3" class="block-keep-ratio block-keep-ratio-1-1 block-width-half box box-white box-nav-item js-nav-item pull-xs-left">
                  <a href="#page-3" class="block-keep-ratio-content box-nav-item-link">
                    <span class="box-text box-text-nav-item flexbox-center">Join</span>
                  </a>
                </li>

                <li data-nav-item-id="page-4" class="block-keep-ratio block-keep-ratio-1-1 block-width-half box box-white box-nav-item js-nav-item pull-xs-right">
                  <a href="#page-4" class="block-keep-ratio-content box-nav-item-link">
                    <span class="box-text box-text-nav-item flexbox-center">Create</span>
                  </a>
                </li>

                <li data-nav-item-id="page-5" class="block-keep-ratio block-keep-ratio-1-1 block-width-half box box-white box-nav-item js-nav-item pull-xs-left">
                  <a href="#page-2" class="block-keep-ratio-content box-nav-item-link">
                    <span class="box-text box-text-nav-item flexbox-center">Comments</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <!-- .header -->

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-7">
          <div class="content-wrapper js-content-wrapper">
            <!-- about -->
            <section data-page-id="page-1" class="content js-content">

              <header class="box box-black margin-b-20">
                <h2 class="box-text page-title-text">Files</h2>
              </header>

              <div class="content-text">
                <?php
 /**
    Download File
*/
try {
  $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
  die('ERROR : '.$e->getMessage());
}

$user = $_SESSION['username'];
/**
  Get the list of group that the user has joined
*/
$req_groupList = $bdd->prepare('SELECT name_group FROM group_users WHERE username = :username OR member = :username');
$req_groupList->execute(array('username' => $user));

echo '<p>';
                
while($groupName = $req_groupList->fetch()) {

$req = $bdd->prepare('SELECT username, user_group, name FROM upload WHERE user_group = :groupName');
$req->execute(array ('groupName' => $groupName['name_group']));

while ($data = $req->fetch()) {
  echo '<strong>Group: '.$data['user_group'].'</strong><br />';
  echo '<a href="../../upload/'.$data['name'].'" download>'.$data['name'].'</a><br />';
  echo 'posted by '.$data['username'].'<br />';
}
  
}
                
echo '</p>';
                
?>
              </div>

            </section>
            <!-- #about -->

            <!-- gallery -->
            <section data-page-id="page-2" class="content content-gallery js-content">

              <header class="box box-black margin-b-20">
                <h2 class="box-text page-title-text">Galllery</h2>
              </header>

              <div class="content-text content-text-gallery">

                <!-- <p>Credits go to <a rel="nofollow" href="http://unsplash.com">Unsplash</a> for images.</p> -->

                <div class="flexslider-wrapper">

                  <div id="slider" class="flexslider">
                    <ul class="slides">
                      <li><img src="img/slider/slide1.jpg" alt="Slide 1" /></li>
                      <li><img src="img/slider/slide2.jpg" alt="Slide 2" /></li>
                      <li><img src="img/slider/slide3.jpg" alt="Slide 3" /></li>
                      <li><img src="img/slider/slide4.jpg" alt="Slide 4" /></li>
                      <li><img src="img/slider/slide5.jpg" alt="Slide 5" /></li>
                      <li><img src="img/slider/slide6.jpg" alt="Slide 6" /></li>
                    </ul>
                  </div>
                  <!-- #slider -->

                  <div id="carousel" class="flexslider">
                    <ul class="slides">
                      <li><img src="img/slider/thumb1.jpg" alt="Thumbnail 1" /></li>
                      <li><img src="img/slider/thumb2.jpg" alt="Thumbnail 2" /></li>
                      <li><img src="img/slider/thumb3.jpg" alt="Thumbnail 3" /></li>
                      <li><img src="img/slider/thumb4.jpg" alt="Thumbnail 4" /></li>
                      <li><img src="img/slider/thumb5.jpg" alt="Thumbnail 5" /></li>
                      <li><img src="img/slider/thumb6.jpg" alt="Thumbnail 6" /></li>
                    </ul>
                  </div>
                  <!-- #carousel -->

                </div>

              </div>

            </section>
            <!-- #gallery -->

            <!-- services -->
            <section data-page-id="page-3" class="content js-content">

              <header class="box box-black margin-b-20">
                <h2 class="box-text page-title-text">Join a Group</h2>
              </header>

              <div class="content-text">
                <p>Join a group for start uploading file and comment</p>
                <?php
  /**
    Choose a group to join
  */
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } catch (Exception $e) {
    die('ERROR : '.$e->getMessage());
  }
  
  if (isset($_SESSION['username'])) {
    $creator = htmlspecialchars($_SESSION['username']);
    
    $req = $bdd->prepare('SELECT username, name_group FROM group_users WHERE username = :creator OR member = :member');
    $req->execute(array('creator' => $creator,
                       'member' => $creator)
                 );
  echo '<form method="post" action="../../file_window/file_window.php">';
  while ($data = $req->fetch()) 
  {  
?>
                  <?php echo '<input type="radio" name="join_group" value="'.$data['name_group'].'" id="'.$data['name_group'].'"/> <label for="'.$data['name_group'].'">'.$data['name_group'].'</label>';?>
                    <?php
  }
    $req->closeCursor();
    echo '<button type="submit" class="btn btn-primary submit-btn">Join</button>';
    echo '</form>';
}
?>
              </div>
            </section>
            <!-- #services -->

            <!-- contact -->
            <section data-page-id="page-4" class="content js-content">

              <header class="box box-black margin-b-20">
                <h2 class="box-text page-title-text">Create</h2>
              </header>

              <div class="content-text">
                <p>Just enter the title of the Group below, for getting start sharing with your friend.
                </p>
                <form action="../../request/create_group.php" method="post" class="contact-form">

                  <div class="form-group">
                    <input type="text" id="create_group_name" name="create_group_name" class="form-control" placeholder="Name" required/>
                  </div>

                  <button type="submit" class="btn btn-primary submit-btn">Create</button>

                </form>
              </div>

            </section>
            <!-- #contact -->
            <section data-page-id="page-5" class="content js-content">

              <header class="box box-black margin-b-20">
                <h2 class="box-text page-title-text">Last Comments</h2>
              </header>

              <div class="content-text">
                <?php
 /**
    Show Comment
*/
try {
  $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
  die('ERROR : '.$e->getMessage());
}

$user = $_SESSION['username'];
/**
  Get the list of group that the user has joined
*/
$req_groupList = $bdd->prepare('SELECT name_group FROM group_users WHERE username = :username OR member = :username');
$req_groupList->execute(array('username' => $user));

echo '<p>';
                
while($groupName = $req_groupList->fetch()) {

$req = $bdd->prepare('SELECT username, name_group, title, message, date_create FROM comment WHERE name_group = :groupName');
$req->execute(array ('groupName' => $groupName['name_group']));

while ($data = $req->fetch()) {
  echo '<h1>'.$data['title'].'</h1> <br />';
  echo '<strong>Group: '.$data['name_group'].'</strong><br />';
  echo  $data['message'].'<br /><br />';  
  echo 'posted by '.$data['username'].', '.$data['date_create'].'<br />';
}
  
}
                
echo '</p>';
                
?>
              </div>

            </section>

          </div>
        </div>

      </div>

      <!-- footer row -->
      <footer class="row footer js-footer">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

          <p class="copyright-text">Copyright &copy; 2016 Company Name | Design: <a href="http://www.templatemo.com/tm-480-story" target="_parent" title="Story Bootstrap Theme">The Story</a></p>

        </div>
      </footer>

    </div>
    <!-- .container-fluid -->

    <div id="preloader">
      <div id="status">&nbsp;</div>
    </div>
    <!-- /#preloader -->

    <!-- load JS files -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- jQuery -->
    <script src="js/jquery.flexslider-min.js"></script>
    <!-- Flex Slider -->
    <script src="js/jquery.backstretch.min.js"></script>
    <!-- Backstretch http://srobbin.com/jquery-plugins/backstretch/ -->
    <script src="js/templatemo-script.js"></script>
    <!-- Templatemo scripts -->

  </body>

  </html>