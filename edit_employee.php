<?php
include ('./shared/header.php');
require_once('./dao/employeeDAO.php');
require_once('./dao/abstractDAO.php');
require_once('./model/employee.php');
require_once('WebsiteUser_mod.php');

if(!isset($_GET['customerId'])){
//Send the user back to the main page
header("Location: index.php");
exit;

} else{
    $customerDAO = new customerDAO();
    $customer = $customerDAO->getCustomer($_GET['customerId']);
    if($customer){
?>    
        
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Week 12 Lab - <?php echo $customer->getCustomerName() ;?></title>
        <script type="text/javascript">
            function confirmDelete(customerName){
                return confirm("Do you wish to delete " + customerName + "?");
            }
        </script>
    </head>
    <body>
        
        <?php
        if(isset($_GET['recordsUpdated'])){
                if(is_numeric($_GET['recordsUpdated'])){
                    echo '<h3> '. $_GET['recordsUpdated']. ' Customer Record Updated.</h3>';
                }
        }
        if(isset($_GET['missingFields'])){
                if($_GET['missingFields']){
                    echo '<h3 style="color:red;"> Please fill in all the fields.</h3>';
                }
        }?>
        <h3>Edit Customer</h3>
        <form name="editCustomer" method="post" action="process_employee.php?action=edit">
            <table>
                <tr>
                    <td>Customer ID:</td>
                    <td><input type="hidden" name="customerId" id="customerId" 
                               value="<?php echo $customer->getCustomerId();?>"><?php echo $customer->getCustomerId();?></td>
                </tr>
                <tr>
                    <td>Customer Name:</td>
                    <td><input type="text" name="customerName" id="customerName" 
                               value="<?php echo $customer->getCustomerName();?>"></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" name="phoneNumber" id="phoneNumber" 
                               value="<?php echo $customer->getPhoneNumber();?>"></td>
                </tr>
                <tr>
                    <td>E-mail Address:</td>
                    <td><input type="text" name="emailAddress" id="emailAddress" 
                               value="<?php echo $customer->getEmailAddress();?>"></td>
                </tr>
                <tr>
                    <td>Referral Type:</td>
                    <td><input type="text" name="referrer" id="referrer" 
                               value="<?php echo $customer->getReferrer();?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><a onclick="return confirmDelete('<?php echo $customer->getCustomerName();?>')" href="process_employee.php?action=delete&customerId=<?php echo $customer->getCustomerId();?>">DELETE <?php echo $customer->getCustomerName();?></a></td>
                </tr>
                <tr>
                    <td><input type="submit" name="btnSubmit" id="btnSubmit" value="Update Customer"></td>
                    <td><input type="reset" name="btnReset" id="btnReset" value="Reset"></td>
                </tr>
            </table>
        </form>
                    
        <h4><a href="mailing_list.php">Back to Customer List</a></h4>
    </body>
</html>
<?php } else{
//Send the user back to the main page
header("Location: mailing_list.php");
exit;
}

} include ('./shared/footer.php');?>