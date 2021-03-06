<?php
  session_start();

  if (isset($_POST['join_group'])) {
    $_SESSION['name_group'] = $_POST['join_group'];
  }
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
      <img src="../../static/pictures/G0011018.JPG" id="page-1-img" class="main-img" alt="About">
      <img src="img/story-bg-2.jpg" id="page-2-img" alt="Gallery">
      <img src="img/story-bg-3.jpg" id="page-3-img" alt="Services">
      <img src="img/story-bg-4.jpg" id="page-4-img" alt="Contact">
      <img src="img/story-bg-2.jpg" id="page-5-img" alt="Add Comment">
    </div>

    <div class="container-fluid">

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">

          <div class="header">

            <!-- site title -->
            <header class="box box-white">
              <a href="../main_window/templatemo_480_story/main_windows.php" class="js-site-title">
                <h1 class="box-text site-title-text"><?php echo $_SESSION['name_group'];?></h1>
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
                <!--
                <li data-nav-item-id="page-2" class="block-keep-ratio block-keep-ratio-1-1 block-width-half box box-white box-nav-item js-nav-item pull-xs-right">
                  <a href="#page-2" class="block-keep-ratio-content box-nav-item-link">
                    <span class="box-text box-text-nav-item flexbox-center">Gallery</span>
                  </a>
                </li>
-->
                <li data-nav-item-id="page-3" class="block-keep-ratio block-keep-ratio-1-1 block-width-half box box-white box-nav-item js-nav-item pull-xs-left">
                  <a href="#page-3" class="block-keep-ratio-content box-nav-item-link">
                    <span class="box-text box-text-nav-item flexbox-center">Add File</span>
                  </a>
                </li>

                <li data-nav-item-id="page-4" class="block-keep-ratio block-keep-ratio-1-1 block-width-half box box-white box-nav-item js-nav-item pull-xs-right">
                  <a href="#page-4" class="block-keep-ratio-content box-nav-item-link">
                    <span class="box-text box-text-nav-item flexbox-center">Add Users</span>
                  </a>
                </li>
                <li data-nav-item-id="page-5" class="block-keep-ratio block-keep-ratio-1-1 block-width-half box box-white box-nav-item js-nav-item pull-xs-right">
                  <a href="#page-5" class="block-keep-ratio-content box-nav-item-link">
                    <span class="box-text box-text-nav-item flexbox-center">Add Comment</span>
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
                
$groupName = $_SESSION['name_group'];
$user = $_SESSION['username'];
                
$req = $bdd->prepare('SELECT username, user_group, name, date_create FROM upload WHERE user_group = :groupName');
$req->execute(array ('groupName' => $groupName));

echo '<p>';
                
while ($data = $req->fetch()) {
  echo '<strong>Group: '.$data['user_group'].'</strong><br />';
  echo '<a href="../../upload/'.$data['name'].'" download>'.$data['name'].'</a><br />';
  echo 'posted by '.$data['username'].', '.$data['date_create'].'<br />';
}
                
echo '</p>';

                
?>
              </div>

            </section>
            <!-- #about -->

            <section data-page-id="page-2" class="content content-gallery js-content">

              <header class="box box-black margin-b-20">
                <h2 class="box-text page-title-text">Gallery</h2>
              </header>

              <div class="content-text content-text-gallery">



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


                </div>

              </div>

            </section>
            <!-- #gallery -->

            <!-- services -->
            <section data-page-id="page-3" class="content js-content">

              <header class="box box-black margin-b-20">
                <h2 class="box-text page-title-text">Add Files</h2>
              </header>

              <div class="content-text">
                <form method="post" action="../request/upload_file.php" enctype="multipart/form-data">
                  <p>Upload your files (.docx, .pdf, .tex) up to 1Mo</p>
                  <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                  <input type="file" name="userfile" id="userfile" />
                  <br />
                  <!--<input type="text" id="add_user" name="add_user" class="form-control" placeholder="Name" required/-->
                  <button type="submit" class="btn btn-primary submit-btn">Save</button>
                </form>
              </div>
         </section>
            <!-- #services -->

            <!-- contact -->
            <section data-page-id="page-4" class="content js-content">

              <header class="box box-black margin-b-20">
                <h2 class="box-text page-title-text">Add Users</h2>
              </header>

              <div class="content-text">
                <p>Just enter the User's username who want to be in the group.
                </p>
                <form action="file_window.php" method="post" class="contact-form">
                  <div class="form-group">
                    <input type="text" id="add_user" name="add_user" class="form-control" placeholder="Username" required/>
                  </div>
                  <button type="submit" class="btn btn-primary submit-btn">Add</button>
                </form>
              </div>
              <?php
  /**
    Add new user within the group
  */
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } catch (Exception $e) {
    die('ERROR : '.$e->getMessage());
  }
  
  if (isset($_POST['add_user']) AND isset($_SESSION['name_group'])) {
    $groupName = htmlspecialchars($_SESSION['name_group']);
    $user = htmlspecialchars($_POST['add_user']);
    
    $req = $bdd->prepare('INSERT INTO group_users(member, name_group, date_create) VALUES(:user, :group, NOW())');
    $req->execute(array('user' => $user,
                       'group' => $groupName)
                 );
  }
?>
            </section>
            <!-- #contact -->

            <section data-page-id="page-5" class="content js-content">

              <header class="box box-black margin-b-20">
                <h2 class="box-text page-title-text">Add a comment</h2>
              </header>

              <div class="content-text">
                <p>Add a comment visible by all members of the group
                </p>
                <form action="file_window.php" method="post" class="contact-form">
                  <div class="form-group">
                    <input type="text" id="group_subject" name="group_subject" class="form-control" placeholder="Subject" required/>
                  </div>
                  <div class="form-group">
                    <textarea id="group_message" name="group_message" class="form-control" rows="4" placeholder="Message" required></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary submit-btn">Send</button>
                </form>
              </div>
          </div>
        </div>
      </div>
      <?php
  /**
    Add a comment
  */
    try {
    $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } catch (Exception $e) {
    die('ERROR : '.$e->getMessage());
  }
        
  if (isset($_POST['group_subject']) AND isset($_POST['group_message'])) {
    $username = htmlspecialchars($_SESSION['username']);
    $groupName = htmlspecialchars($_SESSION['name_group']);
    $title = htmlspecialchars($_POST['group_subject']);
    $message = htmlspecialchars($_POST['group_message']);
    $req = $bdd->prepare('INSERT INTO comment(username, name_group, title, message, date_create) VALUES(:username, :groupName, :title, :message, NOW())');
    $req->execute(array('username' => $username,
                       'groupName' => $groupName,
                       'title' => $title,
                       'message' => $message));    
  }
?>
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