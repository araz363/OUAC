<?php
/**
  Upload file
*/
session_start();
try {
  $bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
  die('ERROR : '.$e->getMessage());
}


if( $_FILES['userfile']['size'] > 0 AND isset($_SESSION['username']) AND isset($_SESSION['name_group']))
{
  
$extensions_valid = array('docx', 'pdf', 'tex');
$extension_upload = strtolower(  substr(  strrchr($_FILES['userfile']['name'], '.')  ,1)  );

if (in_array($extension_upload, $extensions_valid)) {
  
$username = $_SESSION['username'];
$nameGroup = $_SESSION['name_group'];  
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$folder="../../upload/";
 
move_uploaded_file($tmpName, $folder.$fileName);

$req = $bdd->prepare("INSERT INTO upload(username, user_group, name, content, date_create) VALUES(:username, :groupName, :fileName, :content, NOW())");
  
$req->execute( array( 'username' => $username,
                     'groupName' => $nameGroup,
                      'fileName' => $fileName,
                      'content' =>  $fileName)
             );
} 
  
header("Location: http://localhost/cloud/src/file_window/file_window.php");
  
}  
?>
   