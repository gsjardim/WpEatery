<?php 
include ('./shared/header.php');
include_once('./dao/employeeDAO.php');
include_once('./dao/abstractDAO.php');
include_once('./model/employee.php');
require_once('WebsiteUser_mod.php');

session_start();
session_regenerate_id(false);
//echo session_id();

if(isset($_SESSION['websiteUser'])){
    if(!$_SESSION['websiteUser']->isAuthenticated()){
       header('Location:login.php'); 
    }
} else {
    header('Location:login.php');
}
if(isset($_GET['deleted'])&& $_GET['deleted']=='true'){
    echo '<script language="javascript">alert("Customer successfully deleted!")</script>';
}

//$webuser = new WebsiteUser();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Admin's Portal</title>
    </head>
    <body>
        <div id="content" class="clearfix">
            <h1>This is a restricted area Welcome, <?php echo $_SESSION['websiteUser']->getUsername();?></h1>
            <h4><?php echo 'Session Admin ID: '.$_SESSION['websiteUser']->getUserID(); ?></h4>
            <h4><?php echo 'Last Login: '.$_SESSION['websiteUser']->getLastLogin();?></h4>
                <div class="main">
                    <!--Source:https://www.youtube.com/watch?v=bHFoobciCTM-->
                    <table border="1">
                        <thead>Customer Information</thead>
                        <tr><th>Customer ID</th><th>Customer Name</th><th>Phone</th><th>E-mail</th><th>Referral</th></tr>
                        <?php
                        $customerDAO = new customerDAO();
                        $customers = $customerDAO->getCustomers();
                        if($customers){
                            //We only want to output the table if we have employees.
                            //If there are none, this code will not run.
                           
                            foreach($customers as $customer){
                                echo '<tr>';
                                echo '<td>'. $customer->getCustomerId() .'</td>';
                                echo '<td>' . $customer->getCustomerName() . '</td>';
                                echo '<td>' . $customer->getPhoneNumber() . '</td>';
                                echo '<td>' . $customer->getEmailAddress() . '</td>';
                                echo '<td>' . $customer->getReferrer() . '</td>';
                                echo '<td><a href=\'edit_employee.php?customerId='. $customer->getCustomerId() . '\'>Edit</a></td>';
                                echo '</tr>';
                            }
                        }
                           ?> 
                    </table>
                </div><!-- End Main -->
        </div>
   <a href="logout.php">Logout!</a>
    </body>
</html>
<?php include ('./shared/footer.php');?>
