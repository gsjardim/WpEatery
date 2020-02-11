<?php
//This function was based on the following websites:
//https://www.w3resource.com/php-exercises/php-basic-exercise-7.php
//https://stackoverflow.com/questions/24791305/how-to-change-title-dynamically-after-the-header-is-included
$page = basename($_SERVER['PHP_SELF']);

                            switch($page){
                                case 'index.php':
                                    $title = 'WP Eatery - Home';
                                    break;
                                case 'menu.php':
                                    $title = 'WP Eatery - Menu';
                                    break;
                                case 'contact.php':
                                    $title = 'WP Eatery - Contact';
                                    break;
                                case 'mailing_list.php':
                                    $title = 'WP Eatery - Admin Area';
                                    break;
                                case 'edit_employee.php':
                                    $title = 'WP Eatery - Edit Customer';
                                    break;
                                case 'login.php':
                                    $title = 'WP Eatery - Admin Login';
                                    break;
                            }
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Fugaz+One|Muli|Open+Sans:400,700,800' rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="wrapper">
            <header class="clearfix">
                <img src="images/header_img.jpg" alt="Dining Room" title="WP Eatery"/>
                <div id="title">
                    <h1>WP Eatery</h1>
                    <h2>1385 Woodroffe Ave, Ottawa ON</h2>
                    <h2>Tel: (613)727-4723</h2>
                </div>
            </header>
            <nav>
                <div id="menuItems">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="mailing_list.php">List</a></li>
                    </ul>
                </div>
            </nav>
