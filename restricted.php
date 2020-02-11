<?php 
require_once('WebsiteUser_mod.php');
session_start();
session_regenerate_id(false);
echo session_id();

if(isset($_SESSION['websiteUser'])){
    if(!$_SESSION['websiteUser']->isAuthenticated()){
       header('Location:login.php'); 
    }
} else {
    header('Location:login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>This is a restricted area Welcome, <?php echo $_SESSION['websiteUser']->getUsername();?></h1>
        <a href="logout.php">Logout!</a>
    </body>
</html>
